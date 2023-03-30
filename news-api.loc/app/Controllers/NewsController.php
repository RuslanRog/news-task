<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class NewsController extends ResourceController
{

    /**
     * // Return the properties of a resource object
     * Showing some count of news from category.
     *
     * @return mixed
     */
    public function getCount($a = null, $b = null, $c = null)
    {
        var_dump($a);
        var_dump($b);
        var_dump($c);
    }


    /**
     * // Return the properties of a resource object
     * Showing some count of news from category.
     *
     * @return mixed
     */
    public function getByTitle($a = null, $b = null, $c = null)
    {
        var_dump($a);
        var_dump($b);
        var_dump($c);
    }






    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
