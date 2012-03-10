           var active_style;

            function change_style(nr)
            {
                 //document.getElementsByTagName('link')[0].disabled = true ;
                 //document.getElementsByTagName('link')[1].disabled = false ;
                 active_style = nr;
                 for (x in document.styleSheets )
                 {
                    if (x!=nr) document.styleSheets[x].disabled = true;
                    else document.styleSheets[x].disabled = false;
                 }
                 //document.styleSheets[nr].disabled = false;
                 set_cookie(nr);
            }

           function show_styles()
            {
                var c = document.getElementById('changer');
                //var lista = document.createElement('ul');

                for (x in document.styleSheets )
                {
                    if (document.styleSheets[x].title != undefined )
                    {
                        var opcja1 = document.createElement('option');
                        opcja1.textContent = document.styleSheets[x].title;
                        if (active_style == x )
                            opcja1.setAttribute('selected', 'true');
                        opcja1.onclick = new Function('change_style(' + x + ')');
                        c.appendChild(opcja1);
                    }
                }
                //alert(opcja2.attributes[0].onclick);
                //c.appendChild(lista);
            }


            function set_cookie(active)
            {
                document.cookie =
                "active_style=" + encodeURIComponent(active) +
                "; max-age=" + 60*60*24*30 +
                "; path=/";
                /*document.cookie =
                "inactive_style=" + encodeURIComponent(inactive) +
                "; max-age=" + 60*60*24*30 +
                "; path=/";*/
                /*"theme=" + encodeURIComponent("blue theme") +
                "; max-age=" + 60*60*24*30 +
                "; path=/; domain=thesitewizard.com" ;*/
            }

            function get_cookie ( name )
            {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                        var c = ca[i];
                        while (c.charAt(0)==' ') c = c.substring(1,c.length);
                        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }

            function styles()
            {
                active_style = 0;
                var active_from_cookie = get_cookie('active_style');
                if ( active_from_cookie != null )
                     change_style( active_from_cookie );
                show_styles();
            }