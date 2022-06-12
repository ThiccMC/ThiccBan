const mysql = require('mysql2');
require("dotenv").config();

var pool  = mysql.createPool({
    connectionLimit : 10,
    host            : process.env.DB_HOST,
    user            : process.env.DB_USER,
    password        : process.env.DB_PASS,
    database		: process.env.DB_NAME
});

export default async function excuteQuery({ query, values }) {
    const promisePool = pool.promise();
    const data = await promisePool.query(query, values);
    return data;
}