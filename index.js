const path = require('path')
const express = require('express')
const app = express()

const SocketIO = require('socket.io')

app.use((express.static(path.join(__dirname,"public"))))

 
// const url = require('url');
// const myURL =
//   url.parse('http://plataforma.test/chats');


// app.get('/about/chats', (req, res) => {
//     res.send('server port:' + req.params.name)
// })

// app.listen(3000, () => {
//     console.log("Running")
// })


 app.set("port", process.env.PORT || 3000);
 const server = app.listen(app.get("port"), () =>{
     console.log("server port:", app.get("port"));
})

const io = SocketIO(server)


// HOME 
app.get("/", (req,res)=>{
    res.sendFile(path.join(__dirname,"public/index.html"))
})



io.on('connection', (socket)=>{

    socket.on("message", (data)=>{
        socket.broadcast.emit("message", data)
    })

})