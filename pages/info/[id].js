import Head from 'next/head';
import Error from 'next/error';
import { DateTime } from 'luxon';
import Navbar from '../../components/navbar';
import excuteQuery from "../../lib/sql";

export async function getServerSideProps({ params }) {
  var statusCode = 200;
  const preset = [
    "bans", "kicks", "mutes", "warnings"
  ]

  var paReg = /([a-z])+-([0-9])+/;
  var c = -1; var id = 0; var data; var type; var typeColor;
  if (paReg.test(params.id)) {
    var entry = params.id.split("-");
    id = entry[1];
    switch (entry[0]) {
      case "ban":
        c = 0;
        type = "Ban"; typeColor = 'var(--bs-red)';
        break;
      case "kick":
        c = 1;
        type = "Kick"; typeColor = 'var(--bs-success)';
        break;
      case "mute":
        c = 2;
        type = "Mute"; typeColor = 'var(--bs-blue)';
        break;
      case "warn":
        c = 3;
        type = "Warn"; typeColor = 'var(--bs-warning)';
        break;
    }
  } else {
    return {
      props: { statusCode: 400 },
    }
  }

  if (c == -1) {
    statusCode = 400;
  } else {
    const query = await excuteQuery({
      query: 'SELECT * FROM `litebans_' + preset[c] + '` WHERE id = ?',
      values: [id],
    });

    data = query[0][0];
    if (data == null) {
      return {
        props: { statusCode: 400 },
      }
    }
    var fetchUUID = await excuteQuery({
      query: "SELECT name FROM `litebans_history` WHERE uuid = ?",
      values: [data.uuid],
    });
    data.uuid = fetchUUID[0][0].name;
    data.removed_by_date = new Date(data.removed_by_date).getTime();
    data.silent = (Buffer.from(data.silent, 'utf8')).readInt8();
    data.ipban = (Buffer.from(data.ipban, 'utf8')).readInt8();
    data.ipban_wildcard = (Buffer.from(data.ipban_wildcard, 'utf8')).readInt8();
    data.active = (Buffer.from(data.active, 'utf8')).readInt8();

    if (c == 3) data.warned = (Buffer.from(data.warned, 'utf8')).readInt8();
  }

  return {
    props: { statusCode, type, data, typeColor },
  }
}

export default function List({ statusCode, type, data, typeColor }) {
    if (statusCode != 200) {
      return <Error statusCode={statusCode} />;
    }

    return (
    <div>
      <Head>
        <title>{type} #{data.id} | ThiccMC</title>
      </Head>
      <main>
        <Navbar></Navbar>
        <section style={{marginTop: '50px', marginRight: '10px', marginLeft: '10px'}}>
        <div className="container" style={{maxWidth: '700px'}}>
          <div className="row">
            <div className="col-sm-12 col-md-4 col-lg-4" id="punish-info-col-skin" style={{paddingRight: '0px', paddingLeft: '0px', height: '100%'}}>
              <div className="card" style={{maxWidth: '520px', margin: '0 auto', borderWidth: '0px', borderRadius: '0px', height: '100%'}}>
                <div className="card-body text-center">
                  <h6 className="text-center text-muted card-subtitle" style={{marginTop: '0px'}}>{type} for player:</h6>
                  <h4 className="text-center card-title" style={{fontFamily: 'Segoe UI', marginBottom: '0px'}}>{data.uuid}</h4>
                  <div id="punish-info-player-skin" style={{marginTop: '20px'}}><img src={`https://skin.thiccmc.com/resources/server/skinRender?format=png&user=${data.uuid}`} height={320} /></div>
                </div>
              </div>
            </div>
            <div className="col-md-8" style={{paddingRight: '0px', paddingLeft: '0px'}}>
              <div className="card" style={{maxWidth: '520px', margin: '0 auto', borderWidth: '0px', borderRadius: '0px', height: '100%'}} overflow-y="hidden">
                <div className="card-body">
                  <div style={{padding: '5px', marginBottom: '20px'}}><span className="punish-status-tag" style={{background: typeColor}}>{data.ipban == 1 ? 'IP ' + type : type}</span><span className="punish-status-tag" style={{background: data.active == 1 ? 'var(--bs-red)' : 'var(--bs-success)', display: type == "Ban" || type == "Mute" ? 'inline': 'none'}}>{data.active == 1 ? 'Active' : 'Inactive'}</span></div>
                  <p className="text-start" style={{marginBottom: '5px'}}><span className="punish-info-text">ID:</span>&nbsp; #{data.id}</p>
                  <p className="text-start" style={{marginBottom: '5px'}}><span className="punish-info-text">Moderator:</span>&nbsp;&nbsp;<img src={data.banned_by_uuid == "CONSOLE" || data.banned_by_uuid == "[CONSOLE]" ? "/console.png" : "https://skin.thiccmc.com/resources/server/skinRender.php?vr=0&hr=0&headOnly=true&user=" + data.banned_by_name} width={25} style={{borderRadius: '4px'}} />&nbsp;{data.banned_by_uuid == "CONSOLE" || data.banned_by_uuid == "[CONSOLE]" ? "Console" : data.banned_by_name}</p>
                  <p className="text-start mb-0"><span className="punish-info-text">Reason:</span><br />{data.reason}<br /></p>
                  <p className="text-start mb-0"><span className="punish-info-text">Date:</span>&nbsp;{DateTime.fromMillis(data.time).toFormat('MM-dd-yyyy , hh:mm:ss')}<br /></p>
                  <p className="text-start mb-0"><span className="punish-info-text">Expires:</span>&nbsp;{DateTime.fromMillis(data.until).toFormat('MM-dd-yyyy , hh:mm:ss')}<br /></p>
                  <p className="text-start mb-0"><span className="punish-info-text">Server:</span>&nbsp;{data.server_origin}<br /></p>
                  <p className="text-start mb-0" style={{ display: type == "Warn" || data.removed_by_name != null && data.removed_by_name != '#expire' ? 'block' : 'none'}}><span className="punish-info-text">Unban Reason:</span><br />{data.removed_by_reason}<br /></p>
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