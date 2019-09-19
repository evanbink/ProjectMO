<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\BugsRepo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBugsRepoRequest;
use App\Http\Requests\UpdateBugsRepoRequest;
use App\Http\Resources\Admin\BugsRepoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BugsRepoApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bugs_repo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BugsRepoResource(BugsRepo::with(['related'])->get());
    }

    public function store(StoreBugsRepoRequest $request)
    {
        $bugsRepo = BugsRepo::create($request->all());

        if ($request->input('attach', false)) {
            $bugsRepo->addMedia(storage_path('tmp/uploads/' . $request->input('attach')))->toMediaCollection('attach');
        }

        return (new BugsRepoResource($bugsRepo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BugsRepo $bugsRepo)
    {
        abort_if(Gate::denies('bugs_repo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BugsRepoResource($bugsRepo->load(['related']));
    }

    public function update(UpdateBugsRepoRequest $request, BugsRepo $bugsRepo)
    {
        $bugsRepo->update($request->all());

        if ($request->input('attach', false)) {
            if (!$bugsRepo->attach || $request->input('attach') !== $bugsRepo->attach->file_name) {
                $bugsRepo->addMedia(storage_path('tmp/uploads/' . $request->input('attach')))->toMediaCollection('attach');
            }
        } elseif ($bugsRepo->attach) {
            $bugsRepo->attach->delete();
        }

        return (new BugsRepoResource($bugsRepo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BugsRepo $bugsRepo)
    {
        abort_if(Gate::denies('bugs_repo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bugsRepo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
