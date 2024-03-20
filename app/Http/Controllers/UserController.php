<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Request $request)
    {
        $model = User::query()->paginate(10);
        $userIds = $model->pluck('id')->toArray();

        $breadcrumb = [
            [
                'title' => 'Користувачі'
            ]
        ];

        return view('users.index', [
            'model'      => $model,
            'user_ids'   => $userIds,
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Admin();

        return view('admin.admins.create', [
            'model' => $model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateRequest $request)
    {
        /* @var $user Admin */

        $user = Admin::create([
            'name'           => $request->get('name'),
            'email'          => $request->get('email'),
            'password'       => Hash::make($request->get('password')),
            'status'         => Admin::STATUS_REGISTER,
        ]);

        $user->assignRole($request->get('roles'));

        return redirect()->route('admins.index')->with('success', __('Created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Admin::query()->where('id', $id)->first();

        return view('admin.admins.edit', [
            'model' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        /* @var $model Admin */
        $model = Admin::query()->where('id', $id)->first();

        try {
            $model->name = $request->get('name');
            $model->email = $request->get('email');

            if ($request->has('password') && $request->get('password')) {
                $model->password = Hash::make($request->get('password'));
            }

            $model->save();

            $model->syncRoles($request->get('roles'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', __('Updated successfully!'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = Admin::query()->where('id', $id)->first();
        $user->syncRoles([]);

        Admin::query()->where('id', $id)->delete();

        return redirect()->route('admins.index')->with('success', __('Deleted successfully!'));
    }

    public function checkUsersOnlineStatus(Request $request)
    {
        $userIds = $request->input('user_ids');
        $usersOnlineStatus = [];

        foreach ($userIds as $userId) {
            $user = User::findOrFail($userId);
            $lastSeenAt = Carbon::parse($user->last_seen_at);

            $usersOnlineStatus[$userId] = $lastSeenAt->diffInMinutes(Carbon::now()) < 1; // Час онлайну - наприклад, менше 1 хвилини
        }

        return response()->json([
            'success' => true,
            'data'    => $usersOnlineStatus,
        ]);
    }
}
