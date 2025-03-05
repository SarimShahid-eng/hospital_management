@foreach ($lab_details as $lab)
    @if ($lab->lab_test)
        <tr>
            @foreach ($lab->lab_test as $service)
                <td style="display:none;">
                    <input readonly id="doctor_id" style="padding: 7px; border-radius:5px;" class="form-control"
                        name="service_id[]" value='{{ $service->id }}'>
                </td>
                <td><input type="text" readonly id="lab_type" style="padding: 7px; border-radius:5px;"
                        class="form-control" name="service_name[]" value='Labortary'>
                </td>

                <td><input type="text" readonly id="service_name" style="padding: 7px; border-radius:5px;"
                        class="form-control" name="lab_test[]" value='{{ $service->labortary_test }}'>
                </td>
            @endforeach


            <td style="display:none;"><input readonly id="doctor_id" style="padding: 7px; border-radius:5px;"
                    class="form-control" name="doctor_id[]" value='{{ @$lab->lab_test_id }}'>
            </td>
            <td><input name="que_no[]" style="padding: 7px; border-radius:5px;" class="form-control" type="number"
                    value="{{ $lab->que_no }}"></td>
            <td><input name="referring_doctor[]" style="padding: 7px; border-radius:5px;" class="form-control"
                    type="text" value="{{ $lab->referring_doctor }}">
            </td>
            <td><input name="discount[]" style="padding: 7px; border-radius:5px;" class="form-control" type="number"
                    value="{{ $lab->discount }}"></td>
            <td><input readonly style="padding: 7px; border-radius:5px;" name="amount[]" class="  form-control"
                    value="{{ $lab->amount }}" type="text"></td>
            <td data-id="{{ $lab->id }}" class="removeOld text-center"><i class="remove fa fa-close"
                    style="font-size:32px; color: red; cursor: pointer; padding-left: 10px;"></i>
            </td>
        </tr>
    @endif
@endforeach
