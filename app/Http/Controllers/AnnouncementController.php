<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('admin.announcements', [
          'announcements' => $this->announcements(),
        ]);
    }

    /**
     * Return the announcements as json.
     *
     * @return \Illuminate\Database\Eloquent\Collection  $announcement
     */
    public function announcements()
    {
      return Announcement::all()
                    ->map(function ($announcement) {
                      return $this->attachFile($announcement);
                    });
    }
    
    /**
     * Display the form to add resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create() {
      return view('admin.forms.announcement-form', [
        'breadcrumb_active' => 'Create New Announcement',
        'breadcrumb_past' => 'Announcements',
        'breadcrumb_past_url' => route('announcements.index'), 
      ]);
    }
    
    public function edit(Announcement $announcement) {
      $announcement = $this->attachFile($announcement);
      
      return view('admin.forms.announcement-form', [
      'breadcrumb_active' => 'Update Announcement',
      'breadcrumb_past' => 'Announcements',
      'breadcrumb_past_url' => route('announcements.index'), 
      'announcement' => $announcement,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, $this->rules(), $this->messages());
      $announcement = Announcement::create($request->all());
  		if ($announcement && $request->hasFile('picture')) {
  			$this->updateFile($request, $announcement);
  		}
      return redirect()->route('announcements.create')
                       ->with('message', 'Announcement created successfully');
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'title' => 'required',
        // 'title' => 'required|string|unique:announcement,name,'. $id,
        'picture' => 'nullable|file|max:2048',
      ];
    }

    /**
     * Get the validation messages
     *
     * @return array
     */
    private function messages() {
      return [
        'title.unique' => 'An announcement with same title exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      $announcement = Announcement::updateOrCreate(compact('id'), $request->all());
      return $this->attachFile($announcement);
    }
    
    public function updateFile(Request $request, Announcement $announcement)
    {
      $this->validate($request, ['picture' => 'nullable|file|max:2048',]);
      $announcement->clearMediaCollection('announcement_files');
      $extension = $request->file('picture')->getClientOriginalExtension();
      $fileName = uniqid() . $extension;
      $announcement->addMediaFromRequest('picture')
              ->usingFileName($fileName)->toMediaCollection('announcement_files');
      return $this->attachFile($announcement)->picture;
    }
    
    /**
     * Attach Picture to Announcement.
     *
     * @return \App\Announcement  $announcement
     */
    private function attachFile($announcement) {
  
      if($announcement->hasMedia('announcement_files')) {
        $path = $announcement->getFirstMedia('announcement_files')->getPath('thumb');
        if(file_exists($path)) {
          $announcement->picture = $announcement->getFirstMediaUrl('announcement_files', 'thumb');
        } else {
          $announcement->picture = asset('images/file_placeholder.png');
        }
      } else {
        $announcement->picture = null;
      }
            
      return $announcement;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return boolean
     */
    public function destroy(Announcement $announcement)
    {
      $id = $announcement->id;
      $announcement->delete();
      
      return $id;
    }
    
    public function download(Announcement $announcement)
    {
      $pathToFile = $announcement->getFirstMedia('announcement_files')
                                 ->getPath();
      
      return response()->download($pathToFile, $announcement->title);
    }
}
