<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTestCaseRequest;
use App\Http\Requests\StoreTestCaseRequest;
use App\Http\Requests\UpdateTestCaseRequest;
use App\TestCase;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestCaseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('test_case_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testCases = TestCase::all();

        return view('admin.testCases.index', compact('testCases'));
    }

    public function create()
    {
        abort_if(Gate::denies('test_case_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testCases.create');
    }

    public function store(StoreTestCaseRequest $request)
    {
        $testCase = TestCase::create($request->all());
        $testCase->authors()->sync($request->input('authors', []));

        return redirect()->route('admin.test-cases.index');
    }

    public function edit(TestCase $testCase)
    {
        abort_if(Gate::denies('test_case_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testCase->load('authors', 'modified_by');

        return view('admin.testCases.edit', compact('testCase'));
    }

    public function update(UpdateTestCaseRequest $request, TestCase $testCase)
    {
        $testCase->update($request->all());
        $testCase->authors()->sync($request->input('authors', []));

        return redirect()->route('admin.test-cases.index');
    }

    public function show(TestCase $testCase)
    {
        abort_if(Gate::denies('test_case_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testCase->load('authors', 'modified_by');

        return view('admin.testCases.show', compact('testCase'));
    }

    public function destroy(TestCase $testCase)
    {
        abort_if(Gate::denies('test_case_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testCase->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestCaseRequest $request)
    {
        TestCase::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
