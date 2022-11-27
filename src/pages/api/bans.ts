import { NextApiRequest, NextApiResponse } from 'next'
import mySQL from 'src/lib/mysql';

export default async (req: NextApiRequest, res: NextApiResponse) => {
    if (req.query.page) {
        var page = 1;
        if (/^[0-9]*$/.test(req.query.page.toString())) { 
            page = parseInt(req.query.page.toString())
        }
        const query = await getList(page)

        res.status(200).json({
            success: true,
            query
        })
    }

    if (req.query.id) {
        var id = 0;
        if (/^[0-9]*$/.test(req.query.id.toString())) { 
            id = parseInt(req.query.id.toString())
        }

        const { data } = await getInfo(id);

        res.status(200).json({
            success: true,
            data
        })
    }
    
}

async function getList(page: number) {
    const _sql_count = await mySQL({q: 'SELECT COUNT(id) AS counts FROM `'+ process.env.TABLE_PREFIX +'bans`', v: []});

    const _count = _sql_count[0].counts;
    const _pageTotal = _count % 10 != 0 ? (Math.floor(_count / 10) + 1) : _count / 10;
    const _pageCurrent = page >= 1 && page <= _pageTotal ? page : 1;

    const _sql_data = await mySQL({
        q: 'SELECT data.id, data.uuid, data.reason, data.banned_by_name, data.time, user.name FROM '+ process.env.TABLE_PREFIX +'bans AS data LEFT JOIN '+ process.env.TABLE_PREFIX +'history AS user ON data.uuid = user.uuid ORDER BY data.id DESC LIMIT ?,10', 
        v: [(_pageCurrent - 1) * 10]
    })
    
    return { total: _count, pageTotal: _pageTotal, pageCurrent: _pageCurrent, data: _sql_data }
}

async function getInfo(id: number) {
    const _sql_data = await mySQL({
        q: 'SELECT data.id, data.uuid, data.reason, data.banned_by_name, data.removed_by_name, data.removed_by_reason, data.time, data.until, data.server_origin, data.ipban, data.active, user.name FROM '+ process.env.TABLE_PREFIX +'bans AS data LEFT JOIN '+ process.env.TABLE_PREFIX +'history AS user ON data.uuid = user.uuid WHERE data.id = ?', 
        v: [id]
    })

    if (!_sql_data[0]) return { data: null }
    _sql_data[0].until == -1 ? _sql_data[0].until = 0 : undefined
    return { data: _sql_data[0] }
}