<?php

namespace App\Http\Requests;

use App\BugsRepo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateBugsRepoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bugs_repo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'desc'  => [
                'required',
            ],
            'cause' => [
                'required',
            ],
        ];
    }
}
