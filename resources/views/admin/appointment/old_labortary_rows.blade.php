@foreach ($lab_appointments->lab_details as $old_labapp_detail)
    <tr>
        <td style="display:none;"><input readonly id="doctor_id" style="padding: 7px; border-radius:5px;"
                class="form-control" name="doctor_id[]" value='{{ $old_labapp_detail->lab_test_id }}'>
        </td>
        <td><input type="text" readonly id="service_name" style="padding: 7px; border-radius:5px;" class="form-control"
                name="service_name[]" value='Labortary'>
        </td>
        <td><input readonly style="padding: 7px; border-radius:5px;" class="form-control" name="doctor_name[]"
                value='{{ $old_labapp_detail->lab_test->labortary_test }}' type="text"></td>
        <td><input name="que_no[]" style="padding: 7px; border-radius:5px;" class="form-control" type="number"
                value="{{ @$old_appointment_details->que_no }}">
        </td>
        <td><input name="referring_doctor[]" style="padding: 7px; border-radius:5px;" class="form-control"
                type="text" value="{{ @$old_labapp_detail->referring_doctor }}">
        </td>
        <td><input name="discount[]" style="padding: 7px; border-radius:5px;" class="form-control discount"
                type="number" value="{{ @$old_labapp_detail->discount }}">
        </td>
        <td><input readonly style="padding: 7px; border-radius:5px;" name="amount[]" class="  form-control"
                value="{{ $old_labapp_detail->amount }}" type="text"></td>
        <td data-id="{{ @$old_labapp_detail->id }}" class="removeOld text-center"><i class="remove fa fa-close"
                style="font-size:32px; color: red; cursor: pointer; padding-left: 10px;"></i>
        </td>
    </tr>
@endforeach
