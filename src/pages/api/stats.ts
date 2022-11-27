import { NextApiRequest, NextApiResponse } from 'next'
import mySQL from 'src/lib/mysql';

export default async (req: NextApiRequest, res: NextApiResponse) => {
    const _sql_data = await mySQL({
        q: 'SELECT (SELECT COUNT(*) FROM '+ process.env.TABLE_PREFIX +'bans) AS bans_count, (SELECT COUNT(*) FROM '+ process.env.TABLE_PREFIX +'mutes) AS mutes_count, (SELECT COUNT(*) FROM '+ process.env.TABLE_PREFIX +'kicks) AS kicks_count, (SELECT COUNT(*) FROM '+ process.env.TABLE_PREFIX +'warnings) AS warns_count, SUM((SELECT COUNT(*) FROM '+ process.env.TABLE_PREFIX +'bans WHERE active = 1) + (SELECT COUNT(*) FROM '+ process.env.TABLE_PREFIX +'mutes WHERE active = 1)) AS active_count, SUM((SELECT COUNT(*) FROM '+ process.env.TABLE_PREFIX +'bans WHERE active = 0) + (SELECT COUNT(*) FROM '+ process.env.TABLE_PREFIX +'mutes WHERE active = 0)) AS inactive_count',
        v: []
    });

    const data = _sql_data[0];
    data.active_count = parseInt(data.active_count)
    data.inactive_count = parseInt(data.inactive_count)

    res.status(200).json({
        success: true,
        data
    })
}