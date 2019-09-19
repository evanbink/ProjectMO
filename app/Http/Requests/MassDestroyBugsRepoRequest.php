<?php

namespace App\Http\Requests;

use App\BugsRepo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBugsRepoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bugs_repo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:bugs_repos,id',
        ];
    }
}
