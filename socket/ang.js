const http     = require('http');
const path     = require('path');
const fetch    = require('node-fetch');
const { Server } = require('socket.io');
const express  = require('express');
const aplikasi = express();

aplikasi.set('port', process.env.PORT || 1315);

const server = http.createServer(aplikasi);
const socketAllowedOrigins = (process.env.SOCKET_ALLOWED_ORIGINS || '')
  .split(',')
  .map((origin) => origin.trim())
  .filter(Boolean);

if (socketAllowedOrigins.length === 0) {
  throw new Error('SOCKET_ALLOWED_ORIGINS must be configured.');
}

const io = new Server(server, {
  cors: {
    origin: socketAllowedOrigins,
    methods: ['GET', 'POST'],
    credentials: true
  },
  maxHttpBufferSize: Number(process.env.SOCKET_MAX_HTTP_BUFFER_SIZE || 1000000)
});

function isValidPayload(data) {
  return data !== null && typeof data === 'object' && !Array.isArray(data);
}

server.listen(aplikasi.get('port'),function(){

  console.log(`\ninfo: socket sudah berjalan pada port ${aplikasi.get('port')}!`);

  aplikasi.get('/',function(rekues,respon){
    respon.sendFile(path.join(__dirname+'/index.html'));
  });

  io.on('connection',function(socket){

    socket.on('perbaharui pengguna',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui pengguna',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data pengguna.');
      }
    });

    socket.on('perbaharui muted pengguna',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui muted pengguna',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data muted pengguna.');
      }
    });

    socket.on('perbaharui artikel',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui artikel',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data artikel.');
      }
    });

    socket.on('perbaharui kategori',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui kategori',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data kategori artikel.');
      }
    });

    socket.on('perbaharui komentar artikel',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui komentar artikel',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data komentar artikel.');
      }
    });

    socket.on('perbaharui diskusi',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui diskusi',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data diskusi.');
      }
    });

    socket.on('perbaharui suara anggota',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui suara anggota',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data suara anggota.');
      }
    });

    socket.on('perbaharui pencapaian',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui pencapaian',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data pencapaian.');
      }
    });

    socket.on('perbaharui perolehan pencapaian',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui perolehan pencapaian',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data perolehan pencapaian.');
      }
    });

    socket.on('perbaharui sertifikat',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui sertifikat',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data sertifikat.');
      }
    });

    socket.on('perbaharui loker',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui loker',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data lowongan kerja.');
      }
    });

    socket.on('perbaharui jawaban diskusi',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui jawaban diskusi',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data jawaban diskusi.');
      }
    });

    socket.on('perbaharui komentar loker',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui komentar loker',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data komentar lowongan kerja.');
      }
    });

    socket.on('perbaharui data suka komentar artikel',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui data suka komentar artikel',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data suka komentar artikel.');
      }
    });

    socket.on('perbaharui data suka jawaban diskusi',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui data suka jawaban diskusi',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data suka jawaban diskusi.');
      }
    });

    socket.on('perbaharui data suka komentar loker',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui data suka komentar loker',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data suka komentar loker.');
      }
    });

    socket.on('perbaharui data suka artikel',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui data suka artikel',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data suka artikel.');
      }
    });

    socket.on('perbaharui data suka diskusi',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui data suka diskusi',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data suka diskusi.');
      }
    });

    socket.on('perbaharui data suka loker',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui data suka loker',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data suka loker.');
      }
    });

    socket.on('perbaharui data suka jawaban',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui data suka jawaban',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data suka jawaban.');
      }
    });

    socket.on('perbaharui konfigurasi',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui konfigurasi',{
          token:data.token,
          facebook:data.facebook,
          twitter:data.twitter,
          instagram:data.instagram,
          github:data.github,
          whatsapp:data.whatsapp,
          email:data.email,
          youtube:data.youtube,
          versi:data.versi,
          pemeliharaan:data.pemeliharaan,
          np:data.np
        });
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data konfigurasi website always ngoding.');
      }
    });

    socket.on('perbaharui link iklan',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui link iklan',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui link untuk iklan.');
      }
    });

    socket.on('perbaharui iklan',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui iklan',{token:data.token,np:data.np});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui data periklanan.');
      }
    });

    socket.on('perbaharui riwayat',function(){
      io.emit('perbaharui riwayat');
      console.log('info: memperbaharui riwayat.');
    });

    socket.on('perbaharui web data suka artikel',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui web data suka artikel',{token:data.token,aip:data.aip,ia:data.ia});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui website data suka artikel.');
      }
    });

    socket.on('perbaharui web data suka komentar artikel',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui web data suka komentar artikel',{token:data.token,aip:data.aip,ia:data.ia,ik:data.ik});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui website data suka komentar artikel.');
      }
    });

    socket.on('perbaharui web data suka diskusi',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui web data suka diskusi',{token:data.token,aip:data.aip,id:data.id});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui website data suka diskusi.');
      }
    });

    socket.on('perbaharui web data suka jawaban diskusi',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui web data suka jawaban diskusi',{token:data.token,aip:data.aip,id:data.id,ij:data.ij});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui website data suka jawaban diskusi.');
      }
    });

    socket.on('perbaharui web data suka loker',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui web data suka loker',{token:data.token,aip:data.aip,ilk:data.ilk});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui website data suka lowongan kerja.');
      }
    });

    socket.on('perbaharui web data suka komentar loker',function(data){
      if(isValidPayload(data)){
        io.emit('perbaharui web data suka komentar loker',{token:data.token,aip:data.aip,ilk:data.ilk,ik:data.ik});
        io.emit('perbaharui riwayat');
        console.log('info: memperbaharui website data suka komentar lowongan kerja.');
      }
    });

    socket.on('update token',function(data){
      if(isValidPayload(data)){
        io.emit('update token',{
          token:data.token,
          ip:data.ip,
          np:data.np
        });
      }
    });

  });

  // comment for dev env
  // setTimeout(() => {
  //   setInterval(() => {
  //     fetch('http://localhost/alwaysngoding/donasi/update').then(resp => resp.json()).then(json => {
  //       if (json.sukses === true){
  //         io.emit('perbaharui midtrans');
  //         io.emit('perbaharui donasi');
  //         console.log('info: '+json.pesan);
  //       }
  //     });
  //   }, 600000);
  // }, 60000);

});
