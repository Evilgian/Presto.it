<html><head>
    <style>
            body{
                padding-top:10px;
                padding-left: 3vw;
                min-height:100vh;
                background: 
                linear-gradient(90deg, rgba(255,250,230,.6), transparent),
                url('https://dz9yg0snnohlc.cloudfront.net/cro-the-science-behind-rejection-the-meaning-definition-and-rejected-synonyms-2.jpg');
                background-position:center center;
                background-size:cover;
                background-repeat:no-repeat;
                font-family: 'Montserrat', sans-serif;
            }
            
            h1{
                color: darkorange;
                text-shadow: 2px 2px 2px #25252577;
            }
            
            h4{
                width:fit-content;
                font-size:1.2em;
                font-weight:bold;
                background-color: rgba(199, 235, 225, 0.7);
            }
            
            .contact-info{
                color:#004B57;
            }
            
            label{
                display:block;
                font-weight:bold;
                font-size:1.2em;
                margin-top:10px;
                margin-bottom:4px;
            }
            
            .message{
                font-family:monospace;  
                color: #F0FFF2;
                border-radius:10px;
                padding:1vw;
                background-color: rgba(0,0,0,0.4);
                backdrop-filter:blur(3px);
                width:80%;
                font-size:1.2em;
            }
        </style>
    </head><body>
            <h1>Il tuo annuncio è stato approvato</h1>
            <div class="message">Congratulazioni! Il tuo annuncio rispetta tutti i criteri della community ed è stato pubblicato. <p><a href="http://localhost:8000/annunci/show/{{$announcement['id']}}">Visualizzalo ora! </a></p></div>
        
    </body></html>