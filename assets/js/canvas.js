$(document).ready(function() { //Siap
    var canvas = new fabric.Canvas('paper', {
        allowTouchScrolling: true
    });
    var copiedObject;
    var copiedObjects = new Array();
    var canvasScale = 1;
    var SCALE_FACTOR = 1.2;
    var id;
    var lWidth, lColor;
    var groupSvg;
    var inCanvas = false;
    var cJsonF, cJsonB;
    var tempDesign;
    var login = false,
        signupEmail = false;

    canvas.on('object:selected', function(e) {
        e.target.set({
            cornerColor: 'black',
            transparentCorners: false
        });
    });
    //Gambar
    //--Pattern
    if (fabric.PatternBrush) {
        var vLinePatternBrush = new fabric.PatternBrush(canvas);
        vLinePatternBrush.getPatternSrc = function() {

            var patternCanvas = fabric.document.createElement('canvas');
            patternCanvas.width = patternCanvas.height = 10;
            var ctx = patternCanvas.getContext('2d');

            ctx.strokeStyle = this.color;
            ctx.lineWidth = 5;
            ctx.beginPath();
            ctx.moveTo(0, 5);
            ctx.lineTo(10, 5);
            ctx.closePath();
            ctx.stroke();

            return patternCanvas;
        };
        var hLinePatternBrush = new fabric.PatternBrush(canvas);
        hLinePatternBrush.getPatternSrc = function() {

            var patternCanvas = fabric.document.createElement('canvas');
            patternCanvas.width = patternCanvas.height = 10;
            var ctx = patternCanvas.getContext('2d');

            ctx.strokeStyle = this.color;
            ctx.lineWidth = 5;
            ctx.beginPath();
            ctx.moveTo(5, 0);
            ctx.lineTo(5, 10);
            ctx.closePath();
            ctx.stroke();

            return patternCanvas;
        };

        var squarePatternBrush = new fabric.PatternBrush(canvas);
        squarePatternBrush.getPatternSrc = function() {

            var squareWidth = 10,
                squareDistance = 2;

            var patternCanvas = fabric.document.createElement('canvas');
            patternCanvas.width = patternCanvas.height = squareWidth + squareDistance;
            var ctx = patternCanvas.getContext('2d');

            ctx.fillStyle = this.color;
            ctx.fillRect(0, 0, squareWidth, squareWidth);

            return patternCanvas;
        };

        var diamondPatternBrush = new fabric.PatternBrush(canvas);
        diamondPatternBrush.getPatternSrc = function() {

            var squareWidth = 10,
                squareDistance = 5;
            var patternCanvas = fabric.document.createElement('canvas');
            var rect = new fabric.Rect({
                width: squareWidth,
                height: squareWidth,
                angle: 45,
                fill: this.color
            });

            var canvasWidth = rect.getBoundingRectWidth();

            patternCanvas.width = patternCanvas.height = canvasWidth + squareDistance;
            rect.set({
                left: canvasWidth / 2,
                top: canvasWidth / 2
            });

            var ctx = patternCanvas.getContext('2d');
            rect.render(ctx);

            return patternCanvas;
        };
    };
    //End pattern
    $('.t-pen').toggle(function(event) {
        canvas.isDrawingMode = true;
        $(this).css('border-bottom', '3px solid black');
        //Load property
        $('#design-slide').css('z-index', '-9999');
        $('.design-prop').fadeIn().html('<img src="assets/img/web/preload.gif">');
        info("You have enter Drawing Mode");
        //Show menu
        $.ajax({
            url: 'content/property/line.php',
            dataType: 'html',
        })
            .success(function(data) {
                $('.design-prop').html(data);
                $('#property-line-color').spectrum({
                    change: function(color) {
                        canvas.freeDrawingBrush.color = color.toHexString();
                        lColor = color.toHexString();
                    }
                });
            });
        //--
        //End load
    }, function(event) {
        canvas.isDrawingMode = false;
        $('.prop-text').hide();
        $(this).css('border-bottom', '1px solid white');
    });
    //--
    //Property
    $(document).on('change', '#slider-line', function(event) {
        canvas.freeDrawingBrush.width = parseInt($(this).val(), 10);
        lWidth = parseInt($(this).val(), 10);
    });
    $(document).on('change', '#property-line-brush', function(event) {
        val = $(this).val();

        if (val == 'vLinePatternBrush') {
            canvas.freeDrawingBrush = vLinePatternBrush;
        } else if (val == 'hLinePatternBrush') {
            canvas.freeDrawingBrush = hLinePatternBrush;
        } else if (val == 'diamondPatternBrush') {
            canvas.freeDrawingBrush = diamondPatternBrush;
        } else if (val == 'squarePatternBrush') {
            canvas.freeDrawingBrush = squarePatternBrush;
        } else {
            canvas.freeDrawingBrush = new fabric[val + 'Brush'](canvas);
        }
        canvas.freeDrawingBrush.width = lWidth;
        canvas.freeDrawingBrush.color = lColor;
    });
    //End property
    //End drawing

    //Select all
    $('.t-all').click(function(event) {
        canvas.setActiveGroup(new fabric.Group(canvas.getObjects())).renderAll();
        info("Select all objects");
    });
    //End select all

    //Zoom-In
    $('.t-zoom-in').click(function(event) {
        zoomIn();
        return false;
    });

    function zoomIn() {
        // TODO limit the max canvas zoom in

        canvasScale = canvasScale * SCALE_FACTOR;

        //canvas.setHeight(canvas.getHeight() * SCALE_FACTOR);
        //canvas.setWidth(canvas.getWidth() * SCALE_FACTOR);

        var objects = canvas.getObjects();
        for (var i in objects) {
            var scaleX = objects[i].scaleX;
            var scaleY = objects[i].scaleY;
            var left = objects[i].left;
            var top = objects[i].top;

            var tempScaleX = scaleX * SCALE_FACTOR;
            var tempScaleY = scaleY * SCALE_FACTOR;
            var tempLeft = left * SCALE_FACTOR;
            var tempTop = top * SCALE_FACTOR;

            objects[i].scaleX = tempScaleX;
            objects[i].scaleY = tempScaleY;
            objects[i].left = (canvas.getWidth() / 2)-(objects[i].getWidth()/2);
            objects[i].top = canvas.getHeight()/2 - (objects[i].getHeight()/2);

            objects[i].setCoords();
        }

        canvas.renderAll();
    }
    //Zoom-In

    // Zoom Out
    function zoomOut() {
        // TODO limit max cavas zoom out

        canvasScale = canvasScale / SCALE_FACTOR;

        //canvas.setHeight(canvas.getHeight() * (1 / SCALE_FACTOR));
        //canvas.setWidth(canvas.getWidth() * (1 / SCALE_FACTOR));

        var objects = canvas.getObjects();
        for (var i in objects) {
            var scaleX = objects[i].scaleX;
            var scaleY = objects[i].scaleY;
            var left = objects[i].left;
            var top = objects[i].top;

            var tempScaleX = scaleX * (1 / SCALE_FACTOR);
            var tempScaleY = scaleY * (1 / SCALE_FACTOR);
            var tempLeft = left * (1 / SCALE_FACTOR);
            var tempTop = top * (1 / SCALE_FACTOR);

            objects[i].scaleX = tempScaleX;
            objects[i].scaleY = tempScaleY;
            objects[i].left = canvas.getWidth() / 2 - (objects[i].getWidth()/2);
            objects[i].top = canvas.getHeight()/2 - (objects[i].getHeight()/2);

            objects[i].setCoords();
        }

        canvas.renderAll();
    }


    // Reset Zoom
    $('.t-zoom-out').click(function(event) {
        zoomOut();
        return false;
    });

    function resetZoom() {

        canvas.setHeight(canvas.getHeight() * (1 / canvasScale));
        canvas.setWidth(canvas.getWidth() * (1 / canvasScale));

        var objects = canvas.getObjects();
        for (var i in objects) {
            var scaleX = objects[i].scaleX;
            var scaleY = objects[i].scaleY;
            var left = objects[i].left;
            var top = objects[i].top;

            var tempScaleX = scaleX * (1 / canvasScale);
            var tempScaleY = scaleY * (1 / canvasScale);
            var tempLeft = left * (1 / canvasScale);
            var tempTop = top * (1 / canvasScale);

            objects[i].scaleX = tempScaleX;
            objects[i].scaleY = tempScaleY;
            objects[i].left = tempLeft;
            objects[i].top = tempTop;

            objects[i].setCoords();
        }

        canvas.renderAll();

        canvasScale = 1;
    }
    //End reset

    //Add image
    $(document).on('click', '.acr-content-wrapper', function(event) {
        var src = $(this).attr('svg');
        svg_load(src);
        $('#design-slide').hide();
        return false;
    });

    $(document).on('click', '.design-artwork-image-wrapper img', function(event) {
        var src = $(this).attr('svg');
        svg_load(src);
        $('#design-slide').hide();
        return false;
    });

    $(document).on('click', '.design-artwork-image-wrapper', function(event) {
        var src = $(this).find('img').attr('src');
        fabric.Image.fromURL(src, function(img) {
            img.set({
                width: 100,
                height: 100,
                left: canvas.getWidth() / 2,
                top: (canvas.getHeight() / 2) + 32,
            });
            canvas.add(img);
        });
        $('#design-slide').hide();
        return false;
    });
    //End image

    //Right click
    $('canvas').bind('contextmenu', function(env) {
        env.preventDefault();
        var x = env.offsetX;
        var y = env.offsetY;
        _t = env.target;
        _target = _t;
        _ = $(this).offset();
        x = _.left;
        y = _.top;
        $('#design-context-menu').fadeIn().css({
            'top': (env.pageY - y),
            'left': (env.pageX - x)
        });
        return false; //stops the event propigation
    });

    //Add text
    $('#text').click(function(event) {
        $('#design-slide').css('z-index', '-9999');
        $('.design-prop').fadeIn().html('<img src="assets/img/web/preload.gif">');
        $('#design-text').fadeIn();
        //Show menu
        $.ajax({
            url: 'content/property/text.php',
            dataType: 'html',
        })
            .success(function(data) {
                $('.design-prop').html(data);
                $('#property-text').focus();
                $('#prop-color-stroke').spectrum({
                    change: function(color) {
                        teks.set({
                            stroke: color.toHexString(),
                            strokeWidth: 1
                        });
                        canvas.renderAll();
                    },
                    move: function(color) {
                        teks.set({
                            stroke: color.toHexString(),
                            strokeWidth: 1
                        });
                        canvas.renderAll();
                    }

                });
            });
    });
    $(document).on('click', '#prop-efect', function(event) {
        var can = fabric.document.createElement('canvas');
        var txt = "AKU";
        ctx = can.getContext('2d');
        var x = ctx.measureText(txt).width;
        var y = 100;
        can.height = y;

        ctx.font="20px Georgia";
        ctx.fillText(txt, 0, y/2);
        ctx.textBaseline = 'top';
        ctx.textAlign = 'center';


        fabric.Image.fromURL(can.toDataURL(),function(img){
            img.left=100;
            img.top=100;
            canvas.add(img);
            canvas.renderAll();
        });
    });

    //End text
    var teks = new fabric.Text('', {
        fontSize: 40,
        left: canvas.getWidth() / 2,
        top: (canvas.getHeight() / 2) - 32,
    });

    $(document).on('keyup', '#property-text', function(event) {
        str = $(this).val();
        if (str == '') {
            teks.set({
                strokeWidth: 0,
                stroke: 'black',
                fill: 'black '
            });
            canvas.renderAll();
        };
        canvas.remove(teks);
        teks.set({
            text: str
        });
        canvas.add(teks);
        tempDesign = canvas.toJSON();
        canvas.renderAll();
    });
    //Color text
    //Font
    $(document).on('change', '#property-font', function(event) {
        val = $(this).val();
        obj.set({
            fontFamily: val
        });
        canvas.renderAll();
    });
    //End font

    //Pattern
    function loadPattern(src) {
        fabric.util.loadImage(src, function(img) {
            teks.fill = new fabric.Pattern({
                source: img,
                repeat: 'repeat'
            });
            canvas.renderAll();
        });
    }
    //--
    $(document).on('click', '#text-pattern div', function(event) {
        val = $(this).attr('id');
        loadPattern('assets/img/pattern/' + val + '.jpg');
    });
    //End pattern
    //End text

    //Klick biasa
    $(document).bind('click', function(event) {
        if ($(event.target).is('#design-context-menu li')) {
            //if (_target.is('#design-text, #design-artwork')) {}else{return false};
            _ta = $(event.target).attr('action');
            switch (_ta) {
                case "delete":
                    {
                        tempDesign = canvas.toJSON();
                        act = canvas.getActiveObject();
                        act.remove();
                        $('#design-context-menu').fadeOut();
                        break;
                    }
                case "clear":
                    {
                        canvas.clear();
                        break;
                    }
                case "front":
                    {
                        act = canvas.getActiveObject();
                        act.bringToFront();
                        break;
                    }
                case "back":
                    {
                        act = canvas.getActiveObject();
                        act.sendToBack();
                        break;
                    }
            }
        };
        $('#design-context-menu').fadeOut();
    });
    //End click
    //SVG import
    function svg_load(url) {
        fabric.loadSVGFromURL(url, function(objects, options) {
            groupSvg = fabric.util.groupSVGElements(objects, options);
            groupSvg.scaleToWidth(400);
            //groupSvg.scale(0.1);
            groupSvg.set({
                left: canvas.width / 2,
                top: canvas.height / 2,
                scaleY: (canvas.height - 100) / groupSvg.height,
                scaleX: (canvas.width - 180) / groupSvg.width,
            });
            canvas.add(groupSvg).centerObject(groupSvg).renderAll();
            tempDesign=canvas.toJSON();
        });
    }
    //End SVG Import
    //Spectrum
    $('.color').spectrum({
        change: function(color) {
            try {
                obj.paths[0].fill = color.toHexString();
            }catch(err){
                obj.fill = color.toHexString();
            }finally{
                canvas.renderAll();
            }
            

        },
        move: function(color) {

            try {
                obj.paths[0].fill = color.toHexString();
            }catch(err){
                obj.fill = color.toHexString();
            }finally{
                canvas.renderAll();
            }
            
        }
    });
    //End spectrum

    //Change color object
    var obj;
    $('canvas').mousedown(function(event) {
        var objects = canvas.getObjects();
        var objTemp;
        $('.design-prop').html('');
        $('.design-prop').fadeIn().html('<div class="layer-object" style="margin-top:5px;"><h3>Layer objects inspector :</h3></div>');
        for (i in objects){
              if (objects[i].active==true) {
                $('.design-prop').html('');
                objTemp = objects[i];
                obj = objTemp;
                type = objTemp.get('type');
                if (type == 'path-group') {
                    //addGradient(objTemp.paths[0]);
                        artworkInspector();
                        //layer(objTemp);
                        //fetchLayer(objTemp.paths);
                }else if(type == 'text'){
                    addGradient(objTemp);
                }else{
                    $('.design-prop').fadeOut();
                }
              }else{
                addLayerObjects(objects[i],i);
              }
        }
    });
    //End change

    //Inspector
    function addLayerObjects(obj,index){
        $('.design-prop .layer-object').append('<div id="'+index+'" class="object-layer full-w rel bord">'+ //<span class="layer-up no rel inline"></span><span class="layer-down no rel inline"></span>
                '<h3 style="text-transform:capitalize;">Layer '+index+'</h3>'+'<span style="float:right" class="layer-hide rel inline " stat="false"></span><span class="layer-up no rel inline"></span><span class="layer-down no rel inline"></span>'+
            '</div>');
    }

    //Up and down layer
    $(document).on('click', '.layer-up', function(event) {
        event.preventDefault();
        var obj = canvas.getObjects();
        var layerContainer = $(this).parent();
        var id=$(this).parent().attr('id');
        if (layerContainer.prev().is('.object-layer')) {
            layerContainer.insertBefore(layerContainer.prev());
            canvas.bringForward(obj[id]);
            canvas.renderAll();
        };
    });
    $(document).on('click', '.layer-down', function(event) {
        event.preventDefault();
        var obj = canvas.getObjects();
        var layerContainer = $(this).parent();
        var id=$(this).parent().attr('id');
        if (layerContainer.prev().is('.object-layer')) {
            layerContainer.insertBefore(layerContainer.prev());
            canvas.sendBackwards(obj[id]);
            canvas.renderAll();
        };
    });
    //End up and down layer

    //Hide layer
    $(document).on('click', '.layer-hide', function(event) {
        event.preventDefault();
        var stat = $(this).attr('stat');
        var obj = canvas.getObjects();
        var layerContainer = $(this).parent();
        var id=$(this).parent().attr('id');
        if (stat=='true') {
            if (layerContainer.prev().is('.object-layer')) {
                obj[id].set({
                    opacity:0,
                    selectable:false
                })
                canvas.renderAll();
            };
            $(this).attr('stat', 'false');
        }else{
            if (layerContainer.prev().is('.object-layer')) {
                obj[id].set({
                    opacity:1,
                    selectable:true
                })
                canvas.renderAll();
            };
            $(this).attr('stat', 'true');
        }
    });
    //End hide layer


    function artworkInspector(){
        $('#design-slide').css('z-index', '-9999');
        $('.design-prop').html('');
        $('.design-prop').fadeIn().html('<img src="assets/img/web/preload.gif">');
        $('.design-prop').fadeIn().html('<div style="margin-top:5px;"><h3>Artwork inspector :</h3>'+
            '<input type="checkbox" id="prop-fetch-layer"><label for="prop-fetch-layer">  Fetch objects</label><br><br>'+
            '<div class="layer-wrapper"></div></div>');
        //for (i in arr.paths){
        //    canvas.add(arr.paths[i]);
        //}
        //canvas.renderAll();
    }
    $(document).on('click','#prop-fetch-layer',function(event){
        var arr = obj.paths;
        check = $(this).prop('checked');
        if (!check) {
            $('.design-prop .layer-wrapper').html('');
        }else{
            
            for (i in arr){
                $('.design-prop .layer-wrapper').append('<div class="object" id="'+i+'" color="'+arr[i].fill+'"><label>Object '+i+'</label>'+
                    '<div class="object-tool"><label class="object-color"></label></div>'+
                    '</div>');
            }
        }
    })
    $(document).on('mouseover','.object',function(event){
        var id = $(this).attr('id');
        obj.paths[id].fill = '#0BB5FF';
        canvas.renderAll();
    })
    $(document).on('mouseleave','.object',function(event){
        var id =  $(this).attr('id');
        var color = $(this).attr('color');
        obj.paths[id].fill = color;
        canvas.renderAll();
    });
    $(document).on('click', '.object-hide', function(event) {
        event.preventDefault();
        id = $(this).parents('.object').attr('id');
        obj.remove();
    });
    $(document).on('click', '.object-color', function(event) {
        var x = $(this).offset().left;
            x = x - $('.layer-wrapper').offset().left - 150;
        var y = $(this).offset().top;
            y = y - $('.layer-wrapper').offset().top + 35;
        id = $(this).parents('.object').attr('id');
        $('.layer-wrapper').append('<div class="object-tooltip"><span class="close">x</span>'+
                                        '<div class="container">'+
                                        '    <div class="content">'+
                                        '        <div class="center">'+
                                        '           <div style="margin-top:5px;"><p>Color : </p>'+
                                        '           <input type="text" class="object-color" func="color"><br><br>'+
                                        '           <p class="inline">Gradient : </p><input type="text" id="" func="color-start" class="inline object-color"></input>'+
                                        '           <p  class="inline">to : </p><input type="text" id="" func="color-end" class="inline object-color"></input></div>'+
                                        '        </div>'+
                                        '    </div>'+
            '</div>').find('.object-tooltip').css({
                'left': x,
                'top': y
            }).find('.object-color').spectrum({
                            change:function(color){
                                var func = $(this).attr('func');
                                $('.layer-wrapper #'+id).attr('color', color.toHexString());
                                if (func=='color') {
                                    fillColor(obj.paths[id],color.toHexString());
                                }else if(func=='color-start'){
                                    fillGradient('first',obj.paths[id],color.toHexString());
                                }else if(funct=='color-end'){
                                    fillGradient('last',obj.paths[id],color.toHexString());
                                }
                            },
                            move:function(color){
                                var func = $(this).attr('func');
                                $('.layer-wrapper #'+id).attr('color', color.toHexString());
                                if (func=='color') {
                                    fillColor(obj.paths[id],color.toHexString());
                                }else if(func=='color-start'){
                                    fillGradient('first',obj.paths[id],color.toHexString());
                                }else if(func=='color-end'){
                                    fillGradient('last',obj.paths[id],color.toHexString());
                                }
                            }
                        });
        
    });
    $(document).on('click', '.object-tooltip .close', function(event) {
        event.preventDefault();
        $('.object-tooltip').remove();
    });
    function fillColor(target,color){
        target.fill = color;
        canvas.renderAll();
    }
    function fillGradient(start,target,color){
        if (start=='first') {
            target.setGradient('fill',{
              x1: 0,
              y1: 0,
              x2: 0,
              y2: target.height,
              colorStops: {
                0: color,
                1: color2
              }
            });
            color1 = color;
            canvas.renderAll(); 
        }else if(start=='last'){
            target.setGradient('fill',{
              x1: 0,
              y1: 0,
              x2: 0,
              y2: target.height,
              colorStops: {
                0: color1,
                1: color
              }
            });
            color2 = color;
            canvas.renderAll();
        }
    }
    //End inspector

    //Add gradient
    var colorGroup = '#fff';
    var color1 = '#fff';
    var color2 = '#fff';
    function addGradient(target){
        tempDesign = canvas.toJSON();
        $('#design-slide').css('z-index', '-9999');
        $('.design-prop').fadeIn().html('<img src="assets/img/web/preload.gif">');
        $('.design-prop').fadeIn().html('<div style="margin-top:5px;"><p>Color : </p>'+
            '<input type="text" id="prop-color-group"><br><br>'+
            '<p>Gradient : </p><input type="text" id="prop-color-grad-1"></input>'+
            '<p>to : </p><input type="text" id="prop-color-grad-2"></input></div>');
        $('#prop-color-group').spectrum({
            color:colorGroup,
            change:function(color){
                target.fill = color.toHexString();
                canvas.renderAll();
            },
            move:function(color){
                target.fill = color.toHexString();
                canvas.renderAll();
            }
        });
        $('#prop-color-grad-1').spectrum({
            color:color1,
            change:function(color){
                target.setGradient('fill',{
                  x1: 0,
                  y1: 0,
                  x2: 0,
                  y2: target.height,
                  colorStops: {
                    0: color.toHexString(),
                    1: color2
                  }
                });
                color1 = color.toHexString();
                canvas.renderAll();
            },
            move:function(color){
                target.setGradient('fill',{
                  x1: 0,
                  y1: 0,
                  x2: 0,
                  y2: target.height,
                  colorStops: {
                    0: color.toHexString(),
                    1: color2
                  }
                });
                color1 = color.toHexString();
                canvas.renderAll();
            }
        });
        $('#prop-color-grad-2').spectrum({
            color:color2,
            change:function(color){
                target.setGradient('fill',{
                  x1: 0,
                  y1: 0,
                  x2: 0,
                  y2: target.height,
                  colorStops: {
                    0: color1,
                    1: color.toHexString()
                  }
                });
                color2 = color.toHexString();
                canvas.renderAll();
            },
            move:function(color){
                target.setGradient('fill',{
                  x1: 0,
                  y1: 0,
                  x2: 0,
                  y2: target.height,
                  colorStops: {
                    0: color1,
                    1: color.toHexString()
                  }
                });
                color2 = color.toHexString();
                canvas.renderAll();
            }
        });
    }
    //End gradient

    //Get Layer
    function fetchLayer(arr){
        $('#design-slide').css('z-index', '-9999');
        $('.design-prop').fadeIn().html('<img src="assets/img/web/preload.gif">');
        $('.design-prop').html('');
        $('.design-prop');
        for (i in arr)
        {
            $('.design-prop').append('<div class="acr-layer" id="" style="padding:5px;">Object '+i+'<span></span></div>'+
                                        '<div class="container">'+
                                        '    <div class="content">'+
                                        '        <div class="center">'+
                                        '           <div style="margin-top:5px;"><p>Color : </p>'+
                                        '           <input type="text" id="prop-color-group-'+i+'"><br><br>'+
                                        '           <p class="inline">Gradient : </p><input type="text" id="prop-color-grad-1-'+i+'" class="inline"></input>'+
                                        '           <p  class="inline">to : </p><input type="text" id="prop-color-grad-2-'+i+'" class="inline"></input></div>'+
                                        '        </div>'+
                                        '    </div>'+
                                        '</div>');
            addSpectrum(i, arr[i]);
        }
        $('.acr-layer').accordion();
    }
    //End layer

    //Add spectrum
    function addSpectrum(obj,target){
        $('#prop-color-group-'+obj+'').spectrum({
            color:target.fill,
            change:function(color){
                target.fill = color.toHexString();
                canvas.renderAll();
            },
            move:function(color){
                target.fill = color.toHexString();
                canvas.renderAll();
            }
        });
        $('#prop-color-grad-1-'+obj+'').spectrum({
            color:color1,
            change:function(color){
                target.setGradient('fill',{
                  x1: 0,
                  y1: 0,
                  x2: 0,
                  y2: target.height,
                  colorStops: {
                    0: color.toHexString(),
                    1: color2
                  }
                });
                color1 = color.toHexString();
                canvas.renderAll();
            },
            move:function(color){
                target.setGradient('fill',{
                  x1: 0,
                  y1: 0,
                  x2: 0,
                  y2: target.height,
                  colorStops: {
                    0: color.toHexString(),
                    1: color2
                  }
                });
                color1 = color.toHexString();
                canvas.renderAll();
            }
        });
        $('#prop-color-grad-2-'+obj+'').spectrum({
            color:color2,
            change:function(color){
                target.setGradient('fill',{
                  x1: 0,
                  y1: 0,
                  x2: 0,
                  y2: target.height,
                  colorStops: {
                    0: color1,
                    1: color.toHexString()
                  }
                });
                color2 = color.toHexString();
                canvas.renderAll();
            },
            move:function(color){
                target.setGradient('fill',{
                  x1: 0,
                  y1: 0,
                  x2: 0,
                  y2: target.height,
                  colorStops: {
                    0: color1,
                    1: color.toHexString()
                  }
                });
                color2 = color.toHexString();
                canvas.renderAll();
            }
        });
    }
    //End spectrum

    //Iris Color
    $('#color').click(function(event) {
        $('#design-slide').css({
            'height': '325px',
            'top': '0px'
        });
        $('#design-slide').children('.segitiga').css({
            '-webkit-transform': 'translate(-8px,90px)',
            '-moz-transform': 'translate(-8px,90px)'
        });
        $('#design-slide #design-slide-content').html('<img src="assets/img/web/preload.gif">');
        $('#design-slide').removeClass().addClass('animated fadeInLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function(event) {
                $(this).removeClass();
                $(this).children('#design-slide-content').load('content/nav/color.php', function() {
                    $('#color-product').iris({
                        width: 300, // the width in pixel
                        hide: false, // hide the color picker by default
                        palettes: ['#125', '#459', '#78b', '#ab0', '#de3', '#f0f'], // custom palette
                        change: function(event, ui) {
                            groupSvg.paths[0].fill = ui.color.toString();
                        },
                    });
                    $('#color-product').focus();
                });
            }).fadeIn();
    });
    //End Iris color
    //Upload image

    //End upload image

    //Keypress
    $('canvas').mouseenter(function(event) {
        inCanvas = true;
    });
    $('canvas').mouseleave(function(event) {
        inCanvas = false;
    });
    $(document).keydown(function(event) {
        if (inCanvas) {
            key = event.keyCode;
            if (key == 8) {
                event.preventDefault();
                act = canvas.getActiveObject();
                act.remove();
            };

        };
    });
    //Keypress

    //Export
    $('.t-export').click(function(event) {
        var image = canvas.toDataURL("images/png").replace("images/png", "images/octet-stream");
        $(this).attr({
            'download': 'mohgeo.png',
            'href': image,
            'target' :'_blank'
        });
        return true;
    });
    //End export

    function info(t) {
        $('.info').html(t);
        $('.info').animate({
            'top': 0
        }, 500);
        setTimeout(function() {
            $('.info').animate({
                'top': -35
            });
        }, 3000);
    }

    //Switch 
    $('.t-switch').toggle(function() {
        $(this).css('border-bottom', '3px solid black');
        cJsonF = canvas.toJSON();
        canvas.clear();
        if (cJsonB == null) {
            svg_load("assets/img/design/back.svg");
        };
        info("Back Side");
        canvas.loadFromJSON(cJsonB);
        canvas.renderAll();
    }, function() {
        $(this).css('border-bottom', '1px solid white');
        cJsonB = canvas.toJSON();
        canvas.clear();
        info("Front Side");
        canvas.loadFromJSON(cJsonF);
        canvas.renderAll();
    });

    //End switch

    //Function login
    function loginUser(user, pass) {
        $.post('core/action-design.php', {
            'act': 'login',
            'a': user,
            'b': pass
        })
            .success(function(data) {
                if (data == 1) {
                    $('.box').animate({
                        'top': '-200'
                    }, 1000);
                } else {
                    $('.user-text').css('border', '1px solid red');
                }
            })
    }
    //End login

    //Function cek login
    function loginCek(act) {
        $.post('core/action-design.php', {
            'act': 'cek_login'
        })
            .success(function(data) {
                if (data == 1) {
                    login = true;
                    switchAct(act);
                } else if (data == 0) {
                    $('.box').animate({
                        'top': '0'
                    }, 1000);
                }
            });
    }
    //End cek

    //Function switch
    function switchAct(act) {
        switch (act) {
            case 'loadjson':
                {
                    loadJSON();
                    break;
                }
            case 'savejson':
                {
                    saveJSON();
                    break;
                }
            case 'logout':
                {
                    logOut();
                    break;
                }
            case 'login':
                {
                    $('.box').animate({
                        'top': '0'
                    }, 1000);
                    break;
                }
            case 'signup':
                {
                    $('.box-signup').animate({
                        'top': '0'
                    }, 1000);
                    break;
                }
            case 'saveImage':
                {
                    saveImage();
                }

        }
    }
    //End switch

    //Function load json
    function loadJSON() {
        info("<img src='assets/img/web/preload-2.gif'>");
        $.post('core/action-design.php', {
            'act': 'get_design',
            'a': ''
        })
            .done(function(data) {
                canvas.loadFromJSON(data);
            })
    }
    //End load json

    //Function logout
    function logOut() {
        $.post('core/action-design.php', {
            'act': 'logout'
        })
            .success(function(data) {
                login = false;
                info('<label style="color:green">Success for Logout</label>');
            });
    }
    //End logout


    //Undo & redo
    function undo(){
        canvas.clear();
        canvas.loadFromJSON(tempDesign);
        canva.renderAll();
    }
    function redo(){
        canvas.loadFromJSON(tempDesign);
    }
    $('.t-undo').click(function(event) {
        undo();
    });
    $('.t-redo').click(function(event) {
        redo();
    });
    //End undo & redo

    //Account
    $('.t-setting').toggle(function(env) {
        _ = $(this).offset();
        y = _.top - 170;
        x = (18 + env.pageX) - _.left;
        $('.tooltip').hide();
        $('#design-account').fadeIn().css({
            'top': (y),
            'left': (x)
        });
    }, function() {
        $('#design-account').hide();
    });

    $('#design-account li').click(function(event) {
        $('#design-account').hide();
        act = $(this).attr('action');
        switchAct(act);
    });

    //End account

    //Function signup

    function signUp(firstname, lastname, email, pass) {
        $.post('core/action-design.php', {
            'act': 'signup',
            'a': firstname,
            'b': lastname,
            'c': email,
            'd': pass
        })
            .success(function(data) {
                if (data == 1) {
                    info('<label style="color:green">Sign up Success, please verify your email</label>');
                    $('.box-signup').animate({
                        'top': '-350'
                    });
                } else {
                    info('<label style="color:red">Sign up fail, please try again</label>');
                }
            });
    };
    //End signup

    //Signup form
    $('#signup-signup').click(function(event) {
        var firstname = $('#signup-first').val();
        var lastname = $('#signup-last').val();
        var email = $('#signup-email').val();
        var pass = $('#signup-password').val();
        var repass = $('#signup-re-password').val();
        $('.signup-text').filter(function(index) {
            return !this.value;
        }).css('border', '1px solid red');
        if (firstname && lastname && email && pass, repass) {
            if (pass == repass) {
                if (signupEmail) {
                    signUp(firstname, lastname, email, pass);
                } else {
                    $('#signup-email').css('border', '1px solid red');
                }
            } else {
                $('#signup-password,#signup-re-password').css('border', '1px solid red');
            }
        };
    });
    $('#signup-cancel').click(function() {
        $('.box-signup').animate({
            'top': '-350'
        });
        return false;
    });
    //End form Signup

    //Function save json
    function saveJSON() {
        cJsonF = canvas.toJSON();
        info("<img src='assets/img/web/preload-2.gif'>");
        $.post('core/action-design.php', {
            'act': 'save_design',
            'b': 'new',
            'c': JSON.stringify(cJsonF)
        })
            .done(function(data) {
                info("<label style='color:green'>Success saving design</label>");
            })
            .fail(function() {
                info("<label style='color:red'>Failed to save design</label>");
            });
    }
    //End save

    //Load design
    $('.t-load').click(function(event) {
        loginCek('loadjson');
        return false;
    });
    //End load

    //Regex fungsi
    function cekEmail(text, id) {
        var reg = /(\w+)\@(\w+)\.(\w+$|(\w+)\.(\w+$))/;
        if (text.match(reg)) {
            id.css('border', '1px solid black');
            signupEmail = true;
        } else {
            id.css('border', '1px solid red');
            signupEmail = false;
        }
    }
    //End regex
    //Regex-email
    $('#signup-email').keyup(function(event) {
        val = $(this).val();
        cekEmail(val, $(this));
    });
    //End regex

    //Save design
    $('.t-save').click(function(event) {
        loginCek('savejson');
        return false;
    });
    //End save design

    //Login form
    $('#login-cancel').click(function(event) {
        $('.box').animate({
            'top': '-200'
        }, 1000);
        return false;
    });

    $('.user-text, .signup-text').change(function(event) {
        $(this).css('border', '1px solid black');
    });

    $('#password').keypress(function(event) {
        if (event.keyCode == 13) {
            loginBox();
        };
    });

    $('#login-login').click(function(event) {
        loginBox();
    });

    function loginBox() {
        var user = $('#username').val();
        var pass = $('#password').val();
        if (user && pass) {
            loginUser(user, pass);
        } else {
            $('.user-text').filter(function(index) {
                return !this.value;
            }).css('border', '1px solid red');
        }
    }
    //End login form
    //Upload image
    $('#image-file').live('change', function(event) {
        $('#loader').fadeIn().css('z-index', '9999');
        $('#form-image').ajaxForm({
            target: '#result-upload',
            success: function(event) {
                val = $('#design-image-upload').val();
                fabric.Image.fromURL(val, function(img) {
                    img.set({
                        top: canvas.getHeight() / 2,
                        left: canvas.getWidth() / 2,
                        width: 250,
                        height: 350
                    });
                    canvas.add(img);
                });
                $('#loader').fadeOut().css('z-index', '-99999');;
            }
        }).submit();
        $('#design-slide').addClass('animated fadeOutLeft').one('webkitAnimationEnd mozAnimationEnd', function(event) {
            $('#design-slide').css('z-index', '-9999');
        });
    });
    //End upload image

    //Notes
    $(document).on('click', '#notes-ok', function(event) {
        val = $(document).find('#notes-text');
        if (val.val()) {
            saveNotes();
        } else {
            info('<label style="color:red">Fil the box</label>');
            val.focus();
        }
    });

    function saveNotes() {
        content = $(document).find('#notes-text').val();
        $.post('core/action-design.php', {
            'act': 'save_note',
            'a': content
        }, function(textStatus) {
            if (textStatus == 1) {
                info('<label style="color:green">Success for saving note</label>');
                $('#design-slide').hide();
                $(document).find('#notes-text').val('');
            } else if (textStatus == 00) {
                info('<label style="color:red">Please, login first</label>');
            } else {
                info('<label style="color:red">Fail for saving note</label>');
                $(document).find('#notes-text').val('');
            }
        });
    }

    $(document).on('click', '#notes-no', function(event) {
        $('#design-slide').hide();
    });
    //End notes

    //Get design
    $('.get-design img').click(function(event) {
        $(this).parent('div').hide();
        return false;
    });
    getDesign = $.cookie('get-design');
    if (getDesign == 'true') {
        $('.get-design').show();
    } else {
        $('.get-design').hide();
    }
    $('.get-design').click(function() {
        loginCek('saveImage');
    });

    function saveImage() {
        var designImage = canvas.toDataURL();
        $.post('core/action-design.php', {
            'act': 'save_image',
            'a': designImage
        }, function(data) {
            if (data == 1) {
                window.location.href = "?menu=order&order=continue"
            };
        });
    }
    //End get

    function undoSave(){
         $.each(tempDesign, function(index, val) {
              t
         });
    }

    canvas.renderAll();

}); //End ready