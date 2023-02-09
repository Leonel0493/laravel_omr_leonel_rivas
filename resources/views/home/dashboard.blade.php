@extends('home-template')
@section('main')
<div class="title">
  <i class="fa-solid fa-gauge"></i>
  <span class="text">Bienvenido!!</span>
</div>

<div class="boxes">
  <div class="box box1">
    <i class="fa-solid fa-bars-progress"></i>
    <span class="text">Materias Cursadas</span>
    <span class="number">5</span>
  </div>
  <div class="box box2">
    <i class="fa-solid fa-list-check"></i>
    <span class="text">Tareas Pendientes</span>
    <span class="number">4</span>
  </div>
  <div class="box box3">
    <i class="fa-solid fa-square-check"></i>
    <span class="text">Tareas Calificadas</span>
    <span class="number">5</span>
  </div>
</div>

<div class="activity">
  <div class="title">
    <i class="fa-solid fa-clock"></i>
    <span class="text">Proximas Tareas</span>
  </div>
  <div class="activity-data">
    <div class="data names">
      <span class="data-title">Task</span>
      <span class="data-list">home task 1</span>
    </div>
    <div class="data email">
      <span class="data-title">Task</span>
      <span class="data-list">home task 1</span>
    </div>
    <div class="data joined">
      <span class="data-title">Task</span>
      <span class="data-list">home task 1</span>
    </div>
  </div>
</div>

@endsection