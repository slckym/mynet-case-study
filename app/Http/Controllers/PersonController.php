<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonCreateRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Models\Person;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class PersonController extends Controller
{

    private RedirectResponse $redirect;

    public function __construct()
    {
        $redirect = redirect(route('persons.index'));
        $this->setRedirect($redirect);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('person', ['persons' => Person::with('address')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonCreateRequest $request
     *
     * @return RedirectResponse
     */
    public function store(PersonCreateRequest $request)
    {
        try {
            DB::beginTransaction();
            Person::create($request->person())
                ->address()
                ->create($request->address());
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            $this->getWithSystemError();
        }
        return $this->getRedirectWithSuccess();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('persons.create');
    }

    /**
     * @return void
     */
    private function getWithSystemError(): void
    {
        $this->getRedirect()->withErrors(__('System error'));
    }

    /**
     * @return RedirectResponse
     */
    public function getRedirect(): RedirectResponse
    {
        return $this->redirect;
    }

    /**
     * @param RedirectResponse $redirect
     */
    public function setRedirect(RedirectResponse $redirect): void
    {
        $this->redirect = $redirect;
    }

    /**
     * Display the specified resource.
     *
     * @param Person $person
     *
     * @return Renderable
     */
    public function show(Person $person): Renderable
    {
        return view('persons.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Person $person
     *
     * @return Renderable
     */
    public function edit(Person $person): Renderable
    {
        return view('persons.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonUpdateRequest $request
     * @param Person $person
     *
     * @return RedirectResponse
     */
    public function update(PersonUpdateRequest $request, Person $person): RedirectResponse
    {
        $person->update($request->person());
        $person->address()->update($request->address());
        return $this->getRedirectWithSuccess();
    }

    /**
     * @return RedirectResponse
     */
    private function getRedirectWithSuccess(): RedirectResponse
    {
        return $this->getRedirect()->with('success', __('Transaction successful.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Person $person
     *
     * @return RedirectResponse
     */
    public function destroy(Person $person): RedirectResponse
    {
        $person->delete();
        return $this->getRedirectWithSuccess();
    }
}
