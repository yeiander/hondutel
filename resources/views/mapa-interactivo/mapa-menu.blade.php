@extends('layouts.app')
@section('content')
  <section class="section">
    <div class="section-header"  style="max-height: 3rem;">
      <h5 class="page__heading">Menu Mapa</h5>
    </div>

        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

    {{-------------------------- INICIO --------------------------}}
                        
              
    
    <div style="height: 500px; width: 1000px;" id="map" style="width: 600px; height: 400px;"></div>
    <script>
       var map = L.map('map').setView([14.6639388, -86.2177902], 18);
       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);
    </script>
    <script>
       var Corduba = L.marker([14.6639388, -86.2177902], {
title: "Hondutel",
draggable:false,
opacity: 1
}).bindPopup("<b>Hondutel</b>")
.addTo(map);

       var map = L.map('map').setView([14.6639388, -86.2177902], 18);
       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);
    </script>
    <script>
       var Corduba = L.marker([14.663538, -86.215528], {
title: "Terminal",
draggable:false,
opacity: 1
}).bindPopup("<b>Terminal</b>")
.addTo(map);
        
    </script>
       
    {{-------------------------- FINAL ---------------------------}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    

@endsection
