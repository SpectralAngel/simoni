
        function init(){

            //map = new OpenLayers.Map('map');
            // El objeto mapa.
          map = new OpenLayers.Map('map', {    
              controls: [
                    new OpenLayers.Control.Navigation(),              // Navegar por el mapa.
                    new OpenLayers.Control.PanZoomBar(),              // Control de flecha y zoom.
                    new OpenLayers.Control.LayerSwitcher({'ascending':false}),    // Para cambiar los diferentes layers e mostrar el nombre de cada uno.
                    new OpenLayers.Control.ScaleLine(),               // La escala utilizada en el mapa.
                    new OpenLayers.Control.MousePosition(),             // Muestra la latitud y longitud de la posicion del mouse sobre el mapa.
                        ]
            });

            
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    layer = new OpenLayers.Layer.WMS( "OpenLayers WMS",    "http://labs.metacarta.com/wms/vmap0", {layers: 'basic'} );
    layer1 = new OpenLayers.Layer.WMS("OpenLayers WMS", "http://vmap0.tiles.osgeo.org/wms/vmap0",      {layers: 'basic'}     );
   // map.addLayer(layer1);                                                                        
    
    layer3 =  new OpenLayers.Layer.WMS( "Global Imagery", "http://maps.opengeo.org/geowebcache/service/wms",   {layers: "bluemarble"}    );
    //map.addLayer(layer3);
   
   

    var agsstreet = new OpenLayers.Layer.ArcGIS93Rest("ESRI-Rutas Global ","http://server.arcgisonline.com/ArcGIS/rest/services/ESRI_StreetMap_World_2D/MapServer/export");
        var agsimagery = new OpenLayers.Layer.ArcGIS93Rest("ESRI-Imagen Global","http://server.arcgisonline.com/ArcGIS/rest/services/ESRI_Imagery_World_2D/MapServer/export");        
        
        //needed to override default of PNG for tiled services
        agsstreet.params.FORMAT = "jpg";
        agsimagery.params.FORMAT = "jpg";
        
        
        map.addLayer(agsimagery);
        map.addLayer(agsstreet);

            var shaded = new OpenLayers.Layer.VirtualEarth("Basic World", {
                type: VEMapStyle.Shaded
            });

            var hybrid = new OpenLayers.Layer.VirtualEarth("Hibrido", {
                type: VEMapStyle.Hybrid
            });

            var aerial = new OpenLayers.Layer.VirtualEarth("Vista Aerea", {
                type: VEMapStyle.Aerial
            });

           map.addLayer(layer);        
           map.addLayer(aerial);
           map.addLayer(shaded);
           map.addLayer(hybrid);
           yahooLayer = new OpenLayers.Layer.Yahoo( "Yahoo");
           map.addLayer(yahooLayer);

////////////////////////////////////////////////

 

          
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //map.zoomToExtent(new OpenLayers.Bounds(-3.922119,44.335327,4.866943,49.553833));

            var myStyles = new OpenLayers.StyleMap({
                "default": new OpenLayers.Style({
                    pointRadius: "${type}", // sized according to type attribute
                    fillColor: "#E15D0C",
                    strokeColor: "#ffcc66",
                    strokeWidth: 1,
                    graphicZIndex: 1
                                              })
                });


           // map.addLayer(new OpenLayers.Layer.GML("Predio", "gmlpre.xml",  { /*styleMap: myStyles*/ }  ));
            map.addLayer(new OpenLayers.Layer.GML("RHBRP", "gmlusos.xml",  { /* styleMap: myStyles */   }  ));
            var center= new OpenLayers.LonLat( -85.356700279617357,15.472633933237574 );
            map.setCenter(center,8);
        }
