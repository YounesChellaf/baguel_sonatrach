<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewMeetingRoomReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'meeting_room_id' => 'required',
            'date_reservation' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ];
    }
    public function messages()
    {
        return[
        'meeting_room_id.required' => 'Veuillez introduire la salle de reunion a reserver ',
        'date_reservation.required' => 'Veuillez introduire la date de reservation ',
        'time_in.required' => 'Veuillez specifier l heure d entree ',
        'time_out.required' => 'Veuillez specifier l heure de sortie ',
        ];
    }
}
