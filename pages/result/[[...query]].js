import Head from 'next/head';
import Link from 'next/link';
import Error from 'next/error';
import Navbar from '../../components/navbar';
import excuteQuery from "../../lib/sql";

export async function getServerSideProps({ params }) {
  var rRoute = params.query;
  var user,pname;
  if (rRoute == null || rRoute.length > 2)
    return {
      props: { statusCode: 400 },
    }

  user = rRoute[0];
  if (user.length > 16) {
    const nameToUUID = await excuteQuery({
      query: "SELECT `name`,`uuid` FROM litebans_history WHERE `uuid` = ?",
      values: [user],
    });
    if (nameToUUID[0][0] == null) {
      return {
        props: { statusCode: 404 },
      }
    }
    pname = nameToUUID[0][0].name;
  } else {
    const nameToUUID = await excuteQuery({
      query: "SELECT `name`,`uuid` FROM litebans_history WHERE `name` = ?",
      values: [user],
    });
    if (nameToUUID[0][0] == null) {
      return {
        props: { statusCode: 404 },
      }
    }
    user = nameToUUID[0][0].uuid;
    pname = nameToUUID[0][0].name;
  }
  
  const countHistory = await excuteQuery({
    query: "SELECT `id`, `ipban`, `active`,`time`, 'bans' as type FROM `litebans_bans` WHERE `uuid` = ? UNION ALL SELECT `id`, `ipban`, `active`,`time`, 'kicks' as type FROM `litebans_kicks` WHERE `uuid` = ? UNION ALL SELECT `id`, `ipban`, `active`,`time`, 'mutes' as type FROM `litebans_mutes` WHERE `uuid` = ? UNION ALL SELECT `id`, `ipban`, `active`,`time`, 'warns' as type FROM `litebans_warnings` WHERE `uuid` = ? ORDER BY `time` DESC",
    values: [user,user,user,user],
  });
  var bc = countHistory[0];

  var pT = bc.length%5 != 0 ? (Math.floor(bc.length/5) + 1) : bc.length/5;
  var pC = parseInt(rRoute[1]) > 1 && parseInt(rRoute[1]) <= pT ? parseInt(rRoute[1]) : 1;

  const getResult = await excuteQuery({
    query: "SELECT `id`, `ipban`, `active`,`time`, 'bans' as type FROM `litebans_bans` WHERE `uuid` = ? UNION ALL SELECT `id`, `ipban`, `active`,`time`, 'kicks' as type FROM `litebans_kicks` WHERE `uuid` = ? UNION ALL SELECT `id`, `ipban`, `active`,`time`, 'mutes' as type FROM `litebans_mutes` WHERE `uuid` = ? UNION ALL SELECT `id`, `ipban`, `active`,`time`, 'warns' as type FROM `litebans_warnings` WHERE `uuid` = ? ORDER BY `time` DESC LIMIT ?,5",
    values: [user,user,user,user,(pC - 1) * 5],
  });

  var data = getResult[0];

  for (var i=0;i < data.length;i++) {
    data[i].ipban = (Buffer.from(data[i].ipban, 'utf8')).readInt8();
    data[i].active = (Buffer.from(data[i].active, 'utf8')).readInt8();
  }

  return {
    props: { statusCode: 200, data, pname, pC, pT, rRoute },
  }
}

export default function Result({ statusCode, data, pname, pC, pT, rRoute }) {
    if (statusCode != 200) {
      return <Error statusCode={statusCode} />;
    }
    const typeColor = {
      "bans": {
        color: "var(--bs-red)",
        name: "Ban"
      },
      "kicks": {
        color: "var(--bs-success)",
        name: "Kick"
      },
      "mutes": {
        color: "var(--bs-blue)",
        name: "Mute"
      },
      "warns": {
        color: "var(--bs-warning)",
        name: "Warn"
      },
    }
    if (pT == 0) {
      return (
        <div>
          <Head>
            <title>Result | ThiccMC</title>
          </Head>
          <main>
            <Navbar></Navbar>
            <section style={{marginTop: '50px', marginRight: '10px', marginLeft: '10px'}}>
            <div className="container" style={{maxWidth: '700px'}}>
              <div className="row">
                <div className="col-sm-12 col-md-4 col-lg-4" id="punish-info-col-skin" style={{paddingRight: '0px', paddingLeft: '0px', height: '100%'}}>
                  <div className="card" style={{maxWidth: '520px', margin: '0 auto', borderWidth: '0px', borderRadius: '0px', height: '100%'}}>
                    <div className="card-body text-center">
                      <h6 className="text-center text-muted card-subtitle" style={{marginTop: '0px'}}>Punishments for player:</h6>
                      <h4 className="text-center card-title" style={{fontFamily: 'Segoe UI', marginBottom: '0px'}}>{pname}</h4>
                      <div id="punish-info-player-skin" style={{marginTop: '20px'}}><img src={"https://skin.thiccmc.com/resources/server/skinRender?format=png&user=" + pname} height={320} /></div>
                    </div>
                  </div>
                </div>
                <div className="col-md-8" style={{paddingRight: '0px', paddingLeft: '0px'}}>
                  <div className="card" style={{maxWidth: '520px', margin: '0 auto', borderWidth: '0px', borderRadius: '0px', height: '420px', overflowY: "hidden"}}>
                    <div className="card-body text-center" style={{marginTop: '20px'}}>
                      <h5 className="text-muted">This player does not have any recent punishments.</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          </main>
        </div>
      )
    }

    return (
    <div>
      <Head>
        <title>Result | ThiccMC</title>
      </Head>
      <main>
        <Navbar></Navbar>
        <section style={{marginTop: '50px', marginRight: '10px', marginLeft: '10px'}}>
        <div className="container" style={{maxWidth: '700px'}}>
          <div className="row">
            <div className="col-sm-12 col-md-4 col-lg-4" id="punish-info-col-skin" style={{paddingRight: '0px', paddingLeft: '0px', height: '100%'}}>
              <div className="card" style={{maxWidth: '520px', margin: '0 auto', borderWidth: '0px', borderRadius: '0px', height: '100%'}}>
                <div className="card-body text-center">
                  <h6 className="text-center text-muted card-subtitle" style={{marginTop: '0px'}}>Punishments for player:</h6>
                  <h4 className="text-center card-title" style={{fontFamily: 'Segoe UI', marginBottom: '0px'}}>{pname}</h4>
                  <div id="punish-info-player-skin" style={{marginTop: '20px'}}><img src={"https://skin.thiccmc.com/resources/server/skinRender?format=png&user=" + pname} height={320} /></div>
                </div>
              </div>
            </div>
            <div className="col-md-8" style={{paddingRight: '0px', paddingLeft: '0px'}}>
              <div className="card" style={{maxWidth: '520px', margin: '0 auto', borderWidth: '0px', borderRadius: '0px', height: '420px', overflowY: "hidden"}}>
                <div className="card-body text-center">
                  {
                    data.map((a)=>{
                        return (
                          <Link key={"id-" + a.id} href={`/info/${a.type.slice(0,-1)}-${a.id}`}>
                          <div className="card" style={{background: 'rgb(34,34,34)', borderRadius: '0px', cursor: 'pointer'}}>
                            <div className="card-body text-start">
                              <h6 className="d-inline card-title">ID: #{a.id}&nbsp; &nbsp;&nbsp;</h6>
                              <span className="punish-status-tag float-end" style={{background: typeColor[a.type].color}}>{(a.ipban == 1 ? "IP " : "") + typeColor[a.type].name}</span>
                              <span className="punish-status-tag float-end" style={{background: a.active == 1 ? 'var(--bs-red)' : 'var(--bs-success)', display: a.type == "bans" || a.type == "mutes" ? 'inline': 'none'}}>{a.active == 1 ? 'Active' : 'Inactive'}</span>
                            </div>
                          </div>
                          </Link>
                        )
                      })
                    }
                  <div className="text-center" style={{marginTop: '10px', height: '38px'}}>
                    <Link href={`/result/${rRoute[0]}/${pC - 1}`}>
                    <button className="btn btn-primary float-start" type="button" disabled={pC == 1 ? true : false}><i className="fas fa-chevron-left" /></button>
                    </Link>
                    <span>Page {pC}/{pT}</span>
                    <Link href={`/result/${rRoute[0]}/${pC + 1}`}>
                    <button className="btn btn-primary float-end" type="button" disabled={pC == pT ? true : false}><i className="fas fa-chevron-right" /></button>
                    </Link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      </main>
    </div>
    )
}