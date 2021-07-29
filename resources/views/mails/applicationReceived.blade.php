<html><head>
    <style>
    body{
    padding-top:10px;
    padding-left: 3vw;
    min-height:100vh;
        background: 
            linear-gradient(90deg, rgba(0, 255, 235, 0.8), transparent), 
            url('https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fspecials-images.forbesimg.com%2Fdam%2Fimageserve%2F1097747144%2F960x0.jpg%3Ffit%3Dscale');
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
        font-family: cursive;
        color: #F0FFF2;
        border-radius:10px;
        padding:1vw;
        background-color: rgba(0,0,0,0.4);
        backdrop-filter:blur(3px);
        width:80%;
        font-size:1.1em;
    }
    </style>
    </head><body>
            <h1>Nuova candidatura da <span class="contact-info">{{$contact['name']}}</span></h1>
            <h4>email di contatto: <a class="contact-info" href="mailto:{{$contact['email']}}">{{$contact['email']}}</a></h4><br>
            <label>Messaggio:</label><br>
    <div class="message">{{$contact['message']}}</div>
        
    
    
    </body></html>