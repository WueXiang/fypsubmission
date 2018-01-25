<?php

namespace App\Http\Controllers\Api\V1;

use App\Meetinglog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetinglogsController extends Controller
{
    public function index()
    {
        return Meetinglog::all();
    }

    public function show($id)
    {
        return Meetinglog::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $meetinglog = Meetinglog::findOrFail($id);
        $meetinglog->update($request->all());

        return $meetinglog;
    }

    public function store(Request $request)
    {
        $meetinglog = Meetinglog::create($request->all());
        return $meetinglog;
    }

    public function destroy($id)
    {
        $meetinglog = Meetinglog::findOrFail($id);
        $meetinglog->delete();
        return '';
    }
}
