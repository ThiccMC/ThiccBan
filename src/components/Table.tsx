import { DateTime } from 'luxon';
import Image from 'next/image';
import Link from 'next/link';
import { useRouter } from 'next/router';

export function StatsTable({ data }: { data: any }) {
    const router = useRouter()
    return (
        <ul className="list-inline" style={{marginBottom: '8px'}}>
            <li className="list-inline-item">
                <button className="stats" type="button" onClick={() => router.push("/bans")}>
                    <i className="fas fa-ban" />&nbsp;<span className="text">Bans</span>&nbsp;<span className="number bans">{data.bans_count}</span>
                </button>
                <button className="stats" type="button" onClick={() => router.push("/mutes")}>
                    <i className="fas fa-volume-mute" />&nbsp;<span className="text">Mutes</span>&nbsp;<span className="number mutes">{data.mutes_count}</span>
                </button>
                <button className="stats" type="button" onClick={() => router.push("/kicks")}>
                    <i className="fas fa-sign-out-alt" />&nbsp;<span className="text">Kicks</span>&nbsp;<span className="number kicks">{data.kicks_count}</span>
                </button>
                <button className="stats" type="button" onClick={() => router.push("/warns")}>
                    <i className="fas fa-exclamation-triangle" />&nbsp;<span className="text">Warns</span>&nbsp;<span className="number warns">{data.warns_count}</span>
                </button>
                <button className="stats" type="button">
                    <i className="fas fa-times" />&nbsp;<span className="text">Active</span>&nbsp;<span className="number active">{data.active_count}</span>
                </button>
                <button className="stats" type="button">
                    <i className="fas fa-check" />&nbsp;<span className="text">Expired</span>&nbsp;<span className="number expired">{data.inactive_count}</span>
                </button>
            </li>
        </ul>
    )
}

export function PunishTable({ type, data }: { type: any, data: any }) {
    const router = useRouter()
    return (
        <div className="table-responsive text-start p-table" style={{minWidth: '700px'}}>
            <table className="table table-hover">
                <thead>
                    <tr className="text-center">
                        <th style={{width: '180px'}}>Player</th>
                        <th style={{width: '180px'}}>Moderator</th>
                        <th style={{width: '150px'}}>Date</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        data.query.data.map((x: any) => {
                            return (
                                <tr key={`${x.id}`}  onClick={() => router.push(`/${type}/${x.id}`)}>
                                    <td><Image alt="avatar" className="avatar" width={25} height={25} src={`https://skin.thiccmc.com/resources/server/skinRender.php?vr=0&hr=0&headOnly=true&user=${x.name}`} />&nbsp;{x.name}</td>
                                    <td><Image alt="console" className="avatar" width={25} height={25} src={x.banned_by_name == "Server" ? `/img/console.png` : `https://skin.thiccmc.com/resources/server/skinRender.php?vr=0&hr=0&headOnly=true&user=${x.banned_by_name}`} />&nbsp;{x.banned_by_name}</td>
                                    <td className="text-center">{DateTime.fromMillis(x.time).toFormat('MM/dd/yyyy hh:mm:ss')}</td>
                                    <td>{x.reason}</td>
                                </tr>
                            )
                        })
                    }
                </tbody>
            </table>
        </div>
    )
}

export function InfoTable({ type, data }: { type: any, data: any }) {
    return (
        <div className="row" style={{marginRight: '0px', marginLeft: '0px'}}>
            <div className="col-md-4 col-xl-4 align-self-center" style={{paddingRight: '0px', paddingLeft: '0px'}}>
                <Image alt="player-body" src={`https://skin.thiccmc.com/resources/server/skinRender?format=png&user=${data.name}`} width={100} height={230} style={{marginBottom: '8px'}} />
                <Link className="link-light" href={`/players/${data.name}`}>
                <h5 style={{fontFamily: 'Minecraft'}}>{data.name}</h5>
                </Link>
            </div>
            <div className="col-md-8 col-lg-8 col-xl-8 text-start p-0">
                <div className="i-table">
                <table className="table table-borderless">
                    <tbody>
                        { type == "Ban" || type == "Mute" ?
                        <tr>
                            <td className="text-end text-muted">Status</td>
                            <td>
                                <span style={{marginRight: '5px'}}className={`status ${(Buffer.from(data.active, 'utf8')).readInt8() ? 'active' : 'inactive'}`}>{(Buffer.from(data.active, 'utf8')).readInt8() ? 'Active' : 'Inactive'}</span>
                                {(Buffer.from(data.ipban, 'utf8')).readInt8() ? <span className="status active">IP {type}</span> : undefined}
                            </td>
                        </tr> : undefined
                        }
                        <tr>
                            <td className="text-end text-muted" style={{width: '125px'}}>Moderator</td>
                            <td style={{fontFamily: 'Minecraft'}}>
                                <Link className="link-light" href={`/mods/${data.banned_by_name}`}>
                                <Image alt="avatar" className="avatar" width={25} height={25} src={data.banned_by_name == "Server" ? `/img/console.png` : `https://skin.thiccmc.com/resources/server/skinRender.php?vr=0&hr=0&headOnly=true&user=${data.banned_by_name}`} />&nbsp;{data.banned_by_name}
                                </Link>
                            </td>
                        </tr>
                        <tr>
                            <td className="text-end text-muted">Reason</td>
                            <td>{data.reason.replace(/\u00A7[0-9A-FK-OR]/ig, "")}</td>
                        </tr>
                        { type == "Ban" || type == "Mute" ?
                        <tr>
                            <td className="text-end text-muted">Expire</td>
                            <td>{ data.until == 0 && data.active == 1 ? "Permanent" : Date.now() > data.until ? "Expired" : DateTime.fromMillis(data.until).toFormat('MM/dd/yyyy hh:mm:ss')}</td>
                        </tr> : undefined
                        }
                        <tr>
                            <td className="text-end text-muted">Server</td>
                            <td>{data.server_origin}</td>
                        </tr>
                        {
                            data.removed_by_name != null && data.removed_by_name != "#expired" ?
                            (
                        <tr>
                            <td className="text-end text-muted">Removed reason</td>
                            <td>{data.removed_by_reason != null && data.removed_by_reason != "" ? data.removed_by_reason : "No reason provided"} ({data.removed_by_name})</td>
                        </tr>
                            ) : ""
                        }
                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    )
}

export function PlayerProfile({ data }: { data: any}) {
    const router = useRouter();
    const type: any = {
        'ban': ['bans','Ban'],
        'mute': ['mutes','Mute'],
        'kick': ['kicks','Kick'],
        'warn': ['warns','Warn']
    }
    return (
        <div className="row" style={{marginRight: '0px', marginLeft: '0px'}}>
            <div className="col-md-4 col-xl-4" style={{paddingRight: '0px', paddingLeft: '0px'}}>
                <Image alt="player-body" src={`https://skin.thiccmc.com/resources/server/skinRender?format=png&user=${data.user}`} width={100} height={230} style={{marginBottom: '8px'}} />
                <h5 style={{fontFamily: 'Minecraft'}}>{data.user}</h5>
            </div>
            <div className="col-md-8 col-lg-8 col-xl-8 text-start p-list">
            {
                data.data.length == 0 ? (
                    <p>How cool! This player punishment profile is clean.</p>
                ) : 
                (<><ul className="list-group">
                    {
                    data.data.map((d: any) => {
                        return (
                            <Link href={`/${type[d.type][0]}/${d.id}`} key={type[d.type][1]+`-`+d.id}>
                            <li className="list-group-item">
                                <span>{type[d.type][1]} #{d.id}</span>
                                { d.type == "ban" || d.type == "mute" ? <span className={`status float-end ${(Buffer.from(d.active, 'utf8')).readInt8() ? 'active' : 'inactive'}`}>{(Buffer.from(d.active, 'utf8')).readInt8() ? 'Active' : 'Inactive'}</span> : undefined }
                            </li>
                            </Link>
                        )
                    })
                    }
                </ul>
                <ul className="list-inline text-center" style={{marginBottom: '0px', marginTop: '8px'}}>
                    <li className="list-inline-item">
                        <button className="btn btn-primary" onClick={() => { router.push(`${data.user}?page=${data.pageCurrent - 1}`)}} type="button" disabled={ data.pageCurrent == 1 ? true : false }><i className="fas fa-chevron-left" /></button>
                    </li>
                    <li className="list-inline-item">Page {data.pageCurrent}/{data.pageTotal}</li>
                    <li className="list-inline-item">
                        <button className="btn btn-primary" onClick={() => { router.push(`${data.user}?page=${data.pageCurrent + 1}`)}} type="button" disabled={ data.pageCurrent == data.pageTotal ? true : false }><i className="fas fa-chevron-right" /></button>
                    </li>
                </ul></>
                )
            }
            </div>
        </div>
    )
}

export function ModeratorProfile({ data }: { data: any}) {
    const router = useRouter();
    const type: any = {
        'ban': ['bans','Ban'],
        'mute': ['mutes','Mute'],
        'kick': ['kicks','Kick'],
        'warn': ['warns','Warn']
    }
    return (
        <div className="row" style={{marginRight: '0px', marginLeft: '0px'}}>
            <div className="col-md-4 col-xl-4" style={{paddingRight: '0px', paddingLeft: '0px'}}>
                <Image alt="player-body" src={`https://skin.thiccmc.com/resources/server/skinRender?format=png&user=${data.user}`} width={100} height={230} style={{marginBottom: '8px'}} />
                <h5 style={{fontFamily: 'Minecraft'}}>{data.user}</h5>
            </div>
            <div className="col-md-8 col-lg-8 col-xl-8 text-start p-list">
            {
                data.data.length == 0 ? (
                    <p>This player does not have any recent execution.</p>
                ) : 
                (<><ul className="list-group">
                    {
                    data.data.map((d: any) => {
                        return (
                            <Link href={`/${type[d.type][0]}/${d.id}`} key={type[d.type][1]+`-`+d.id}>
                            <li className="list-group-item">
                                <span>{type[d.type][1]} #{d.id}</span>
                                <span className='float-end'><Image alt="avatar" className="avatar" width={25} height={25} src={`https://skin.thiccmc.com/resources/server/skinRender.php?vr=0&hr=0&headOnly=true&user=${d.name}`} /> {d.name}</span>
                            </li>
                            </Link>
                        )
                    })
                    }
                </ul>
                <ul className="list-inline text-center" style={{marginBottom: '0px', marginTop: '8px'}}>
                    <li className="list-inline-item">
                        <button className="btn btn-primary" onClick={() => { router.push(`${data.user}?page=${data.pageCurrent - 1}`)}} type="button" disabled={ data.pageCurrent == 1 ? true : false }><i className="fas fa-chevron-left" /></button>
                    </li>
                    <li className="list-inline-item">Page {data.pageCurrent}/{data.pageTotal}</li>
                    <li className="list-inline-item">
                        <button className="btn btn-primary" onClick={() => { router.push(`${data.user}?page=${data.pageCurrent + 1}`)}} type="button" disabled={ data.pageCurrent == data.pageTotal ? true : false }><i className="fas fa-chevron-right" /></button>
                    </li>
                </ul></>
                )
            }
            </div>
        </div>
    )
}