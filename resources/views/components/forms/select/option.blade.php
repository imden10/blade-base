@aware(['value' => null])

<option value="{{$val ?? ''}}" @selected(isset($val) && $val == $value) >{{$slot}}</option>
