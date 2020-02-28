if (response.success) {
                
                var output = "<h1>" + response.data.message + "</h1>";
                
                // recorremos cada usuario
                $.each(response.data.users, function(key, value) {
                    
                    output += "<h2>Detalles del usuario " + value['ID'] + "</h2>";
                    
                    // recorremos los valores de cada usuario
                    $.each(value, function(userkey, uservalue) {
                        
                        output += '<ul>';
                        output += '<li>' + userkey + ': ' + uservalue + "</li>";
                        output += '</ul>';
                        
                    });
                    
                });
                
                // Actualizamos el HTML del elemento con id="#response-container"
                $("#response-container").html(output);
                
                } else {
                
                //response.success no es true
                $("#response-container").html('No ha habido suerte: ' + response.data.message);
                
            }
            
        })