// Polling also detects host edits on Docker VM shared folders.
const { watchFile } = require('node:fs');
const { spawn } = require('node:child_process');

let worker;
let restarting = false;
let stopping = false;

function start() {
  worker = spawn(process.execPath, ['ang.js'], { stdio: 'inherit' });
  worker.on('exit', (code) => {
    if (stopping) process.exit(0);
    if (restarting) {
      restarting = false;
      start();
    } else {
      process.exit(code || 1);
    }
  });
}

for (const filename of ['ang.js', 'index.html']) {
  watchFile(filename, { interval: 500 }, (current, previous) => {
    if (!stopping && !restarting && current.mtimeMs !== previous.mtimeMs) {
      restarting = true;
      console.log(`${filename} changed; restarting socket service.`);
      worker.kill('SIGTERM');
    }
  });
}

for (const signal of ['SIGINT', 'SIGTERM']) {
  process.on(signal, () => {
    stopping = true;
    worker.kill(signal);
  });
}

start();
