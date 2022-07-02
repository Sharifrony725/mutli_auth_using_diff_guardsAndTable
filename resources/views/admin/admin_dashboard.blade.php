@extends('admin.includes.master')
    @section('content')
        <h1>This is Admin Dashboard</h1>
        <p>Hi {{ Auth::guard('admin')->user()->name }}</p>
    @endSection
