import mysql, { RowDataPacket } from 'mysql2'

const pool  = mysql.createPool({
    connectionLimit : 10,
    host            : process.env.DB_HOST,
    user            : process.env.DB_USER,
    password        : process.env.DB_PASS,
    database		: process.env.DB_NAME
});

export default async function mySQL({ q, v }: {q: string, v: any}) {
    const promisePool = pool.promise();
    const data = await promisePool.query(q, v);
    return (data[0] as RowDataPacket[]);
}