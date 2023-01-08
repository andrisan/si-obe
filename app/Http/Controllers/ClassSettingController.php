<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassSettingController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param CourseClass $class
     * @return void
     */
    public function show(CourseClass $class)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseClass $class
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(CourseClass $class)
    {
        $this->authorize('update', [CourseClass::class, $class]);

        return view('class-setting.edit', ['class' => $class]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CourseClass $class
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, CourseClass $class)
    {
        $this->authorize('update', [CourseClass::class, $class]);

        $validated = $request->validate([
            'llo_threshold' => 'required|numeric|min:0|max:100',
        ]);

        $class->settings = [
            'llo_threshold' => $validated['llo_threshold'],
        ];
        $class->save();

        return back()->with('success', 'Class settings updated');
    }
}
