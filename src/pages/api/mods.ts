import { NextApiRequest, NextApiResponse } from 'next'
import mySQL from 'src/lib/mysql';
const { TABLE_PREFIX } = process.env

export default async (req: NextApiRequest, res: NextApiResponse) => {
    if (req.query.user && req.query.page) {
        const query = await getProfile(req.query.user.toString(), parseInt(req.query.page.toString()))
        res.status(200).json({
            success: true,
            query
        })
    }
}

async function getProfile(user: string, page: number) {
    const _sql_uuid = await mySQL({
        q: 'SELECT name, uuid FROM '+ TABLE_PREFIX +'history WHERE name = ? ORDER BY id DESC',
        v: [user]
    })
    if (!_sql_uuid[0]) return null;
    const uuid = _sql_uuid[0].uuid;

    const _sql_count = await mySQL({
        q: 'SELECT SUM((SELECT COUNT(*) FROM '+TABLE_PREFIX+'bans WHERE banned_by_uuid = ?) + (SELECT COUNT(*) FROM '+TABLE_PREFIX+'mutes WHERE banned_by_uuid = ?) + (SELECT COUNT(*) FROM '+TABLE_PREFIX+'kicks WHERE banned_by_uuid = ?) + (SELECT COUNT(*) FROM '+TABLE_PREFIX+'warnings WHERE banned_by_uuid = ?)) AS "sum"',
        v: [uuid, uuid, uuid, uuid]
    })

    const _count = parseInt(_sql_count[0].sum);
    const _pageTotal = _count % 5 != 0 ? (Math.floor(_count / 5) + 1) : _count / 5;
    const _pageCurrent = page >= 1 && page <= _pageTotal ? page : 1;

    const _sql_data = await mySQL({
        q: 'SELECT "ban" AS type, ban.id, ban.uuid, ban.time FROM '+TABLE_PREFIX+'bans AS ban WHERE ban.banned_by_uuid = ? UNION SELECT "mute" AS type, mute.id, mute.uuid, mute.time FROM '+TABLE_PREFIX+'mutes AS mute WHERE mute.banned_by_uuid = ? UNION SELECT "kick" AS type, kick.id, kick.uuid, kick.time FROM '+TABLE_PREFIX+'kicks AS kick WHERE kick.banned_by_uuid = ? UNION SELECT "warn" AS type, warn.id, warn.uuid, warn.time FROM '+TABLE_PREFIX+'warnings AS warn WHERE warn.banned_by_uuid = ? ORDER BY time DESC LIMIT ?,5', 
        v: [uuid, uuid, uuid, uuid, (_pageCurrent - 1) * 5]
    })

    const _sql_history = await mySQL({
        q: 'SELECT uuid, name FROM '+TABLE_PREFIX+'history',
        v: []
    })

    _sql_data.forEach((x) => {
        _sql_history.forEach((y) => {
            if (x.uuid == y.uuid) {
                x.name = y.name
            }
        })
        delete x.uuid
    })
    

    return { user: _sql_uuid[0].name, total: _count, pageTotal: _pageTotal, pageCurrent: _pageCurrent, data: _sql_data }
}