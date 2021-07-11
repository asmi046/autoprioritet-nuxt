// module.exports = {
//   apps: [
//     {
//       name: 'nuxt-dev',
//       script: 'npm',
//       args: 'run dev'
//     },
//     {
//       name: 'nuxt-prod',
//       script: 'npm',
//       args: 'run start'
//     }
//   ]
// }


module.exports = {
  apps: [
    {
      name: 'site-start',
      exec_mode: 'cluster',
      instances: 'max', // Or a number of instances
      script: './node_modules/nuxt/bin/nuxt.js',
      args: 'start'
    }
  ]
}