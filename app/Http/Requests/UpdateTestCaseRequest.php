<?php

namespace App\Http\Requests;

use App\TestCase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTestCaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('test_case_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'test_case'       => [
                'min:7',
                'max:11',
                'required',
            ],
            'title'           => [
                'required',
            ],
            'summary'         => [
                'required',
            ],
            'steps'           => [
                'required',
            ],
            'expected_result' => [
                'required',
            ],
            'post_condition'  => [
                'required',
            ],
            'actual_result'   => [
                'required',
            ],
            'status'          => [
                'required',
            ],
        ];
    }
}
