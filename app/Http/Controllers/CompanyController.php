<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class CompanyController extends Controller
{
    /**
     * Clients Event Logger
     *
     * @var \Monolog\Logger
     */
    protected $clientLog;

    /**
     * Constructor of ClientsController
     * Initialize Logger
     *
     * @return void
     */
    public function __construct(){
        $this->clientLog = new Logger('client');
        $this->clientLog->pushHandler(new StreamHandler(storage_path('logs/client.log')), Logger::INFO);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 5;

        // Pagination
        $count = Company::getTotal();
        $page = $request->input('page') ? $request->input('page') : 1;

        $paginator = new Paginator([], $count, $limit, $page, [
            'path'  => $request->url(),
            'query' => $request->query(),
        ]);

        // Selecting records according to page number
        $offset = ($page-1)*$limit; // get records start from

        $companies = Company::getRecords($offset, $limit);

        return view('company.list', ['company' => $companies, 'paginator' => $paginator]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::getOne($id);

        if(!$company) {
            throw new \Exception('Client record not found.');
        }

        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
