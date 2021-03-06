// server.js
const express = require('express')
const expressGraphQL = require('express-graphql').graphqlHTTP

const schema = require('./schema.js')

const app = express()

app.listen(4000, () => {
  console.log('Server is running on port 4000...')
})




app.use('/graphql', expressGraphQL({
  schema,
  graphiql: true,
}))
