@extends('includes.master')
    @section('content')
        <h1>This is User Dashboard</h1>
        <p>Hi {{ Auth::guard('web')->user()->name }}</p>
    @endSection

