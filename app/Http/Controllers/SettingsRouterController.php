<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Priority;
use App\Models\Status;
use Illuminate\Http\Request;

class SettingsRouterController extends Controller
{
    public function loadView(Request $request)
    {
        $view = $request->view;
        $data = null;
        $elements = null;

        switch ($view) {
            case 'Levels':

                $elements = Level::all();

                break;
            case 'Status':

                $elements = Status::all();

                break;
            case 'Priority':

                $elements = Priority::all();

                break;
        }

        $data = view('components.Layouts.settings.settings-main-panel')
            ->with([
                'data' => $elements,
                'linker' => $view
            ])
            ->render();
        return array(
            'resp' => $data
        );
    }

    public function getItem(Request $request)
    {
        $data = null;
        $form_data = null;
        $title = $request->linker;


        if (isset($request->id)) {
            $id = $request->id;

            switch ($title) {
                case 'Levels':

                    $form_data = Level::find($id);

                    break;
                case 'Status':

                    $form_data = Status::find($id);

                    break;
                case 'Priority':

                    $form_data = Priority::find($id);

                    break;
            }
        }

        $data = view('components.Forms.settings-Forms')
            ->with([
                'data' => $form_data,
                'title' => $title
            ])
            ->render();

        return array(
            'resp' => $data
        );
    }

    public function updateItem(Request $request)
    {
        $id = $request->id;
        $level_name = $request->name;
        $level_description = $request->description;
        $title = $request->title;
        $model = null;

        switch ($title){
            case 'Levels':
                $model = Level::find($id);
                break;
            case 'Status':
                $model = Status::find($id);
                break;
            case 'Priority':
                $model = Priority::find($id);
                break;
        }

        $model->name = $level_name;
        $model->description = $level_description;

        $save = $model->save();

        if ($save) {
            return array(
                'resp' => true
            );
        }else{
            return array(
                'resp' => false
            );
        }


    }

    public function destroy(Request $request)
    {
        $title = $request->title;
        $id = $request->id;

        switch ($title){
            case 'Levels':
                $model = Level::find($id);
                break;
            case 'Status':
                $model = Status::find($id);
                break;
            case 'Priority':
                $model = Priority::find($id);
                break;
        }


        $model->delete();

        return  array(
            'resp'=>true
        );

    }

    public function createItem(Request $request)
    {
        $title = $request->title;
        $name = $request->name;
        $description = $request->description;
        $model = null;

        switch ($title){
            case 'Levels':
                $model = new Level();
                break;
            case 'Status':
                $model = new Status();
                break;
            case 'Priority':
                $model = new Priority();
                break;
        }

        $model->name = $name;
        $model->description = $description;

        $save = $model->save();

        if ($save) {
            return array(
                'resp' => true
            );
        }else{
            return array(
                'resp' => false
            );
        }
    }
}
