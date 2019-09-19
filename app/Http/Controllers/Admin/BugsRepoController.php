<?php

namespace App\Http\Controllers\Admin;

use App\BugsRepo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBugsRepoRequest;
use App\Http\Requests\StoreBugsRepoRequest;
use App\Http\Requests\UpdateBugsRepoRequest;
use App\Issue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BugsRepoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bugs_repo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bugsRepos = BugsRepo::all();

        return view('admin.bugsRepos.index', compact('bugsRepos'));
    }

    public function create()
    {
        abort_if(Gate::denies('bugs_repo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $related = Issue::all()->pluck('desc', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bugsRepos.create', compact('related'));
    }

    public function store(StoreBugsRepoRequest $request)
    {
        $bugsRepo = BugsRepo::create($request->all());

        if ($request->input('attach', false)) {
            $bugsRepo->addMedia(storage_path('tmp/uploads/' . $request->input('attach')))->toMediaCollection('attach');
        }

        return redirect()->route('admin.bugs-repos.index');
    }

    public function edit(BugsRepo $bugsRepo)
    {
        abort_if(Gate::denies('bugs_repo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $related = Issue::all()->pluck('desc', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bugsRepo->load('related');

        return view('admin.bugsRepos.edit', compact('related', 'bugsRepo'));
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

        return redirect()->route('admin.bugs-repos.index');
    }

    public function show(BugsRepo $bugsRepo)
    {
        abort_if(Gate::denies('bugs_repo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bugsRepo->load('related');

        return view('admin.bugsRepos.show', compact('bugsRepo'));
    }

    public function destroy(BugsRepo $bugsRepo)
    {
        abort_if(Gate::denies('bugs_repo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bugsRepo->delete();

        return back();
    }

    public function massDestroy(MassDestroyBugsRepoRequest $request)
    {
        BugsRepo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
