<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestCaseRequest;
use App\Http\Requests\UpdateTestCaseRequest;
use App\Http\Resources\Admin\TestCaseResource;
use App\TestCase;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestCaseApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('test_case_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestCaseResource(TestCase::with(['authors', 'modified_by'])->get());
    }

    public function store(StoreTestCaseRequest $request)
    {
        $testCase = TestCase::create($request->all());
        $testCase->authors()->sync($request->input('authors', []));

        return (new TestCaseResource($testCase))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TestCase $testCase)
    {
        abort_if(Gate::denies('test_case_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestCaseResource($testCase->load(['authors', 'modified_by']));
    }

    public function update(UpdateTestCaseRequest $request, TestCase $testCase)
    {
        $testCase->update($request->all());
        $testCase->authors()->sync($request->input('authors', []));

        return (new TestCaseResource($testCase))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TestCase $testCase)
    {
        abort_if(Gate::denies('test_case_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testCase->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
