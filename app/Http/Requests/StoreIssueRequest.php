<?php

namespace App\Http\Requests;

use App\Issue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreIssueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('issue_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'projects_name_id' => [
                'required',
                'integer',
            ],
            'desc'             => [
                'required',
            ],
            'priority'         => [
                'required',
            ],
        ];
    }
}
