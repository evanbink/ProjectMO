<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIssueRequest;
use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use App\Issue;
use App\TimeProject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IssueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('issue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $issues = Issue::all();

        return view('admin.issues.index', compact('issues'));
    }

    public function create()
    {
        abort_if(Gate::denies('issue_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects_names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.issues.create', compact('projects_names'));
    }

    public function store(StoreIssueRequest $request)
    {
        $issue = Issue::create($request->all());

        return redirect()->route('admin.issues.index');
    }

    public function edit(Issue $issue)
    {
        abort_if(Gate::denies('issue_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects_names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $issue->load('projects_name', 'testcase', 'progress');

        return view('admin.issues.edit', compact('projects_names', 'issue'));
    }

    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        $issue->update($request->all());

        return redirect()->route('admin.issues.index');
    }

    public function show(Issue $issue)
    {
        abort_if(Gate::denies('issue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $issue->load('projects_name', 'testcase', 'progress');

        return view('admin.issues.show', compact('issue'));
    }

    public function destroy(Issue $issue)
    {
        abort_if(Gate::denies('issue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $issue->delete();

        return back();
    }

    public function massDestroy(MassDestroyIssueRequest $request)
    {
        Issue::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
