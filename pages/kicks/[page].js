import Head from 'next/head'
import Link from 'next/link'
import Navbar from '../../components/navbar';
import SearchBar from '../../components/searchbar';
import excuteQuery from "../../lib/sql";

export async function getServerSideProps({ params }) {
  const result = await excuteQuery({
    query: 'SELECT COUNT(id) AS kickcounts FROM `litebans_kicks`',
    values: null,
  });
  var bc = result[0][0].kickcounts;

  var pT = bc%10 != 0 ? (Math.floor(bc/10) + 1) : bc/10;
  var pC = parseInt(params.page) > 1 && parseInt(params.page) <= pT ? parseInt(params.page) : 1;

  var query = "SELECT id, uuid, reason, banned_by_uuid, banned_by_name, time FROM `litebans_kicks` ORDER BY `id` DESC LIMIT " + (pC - 1) * 10 + ",10";

  const bs = await excuteQuery({
    query: query,
    values: null,
  });

  var data = bs[0];

  for (var i=0;i < data.length;i++) {
    var fetchUUID = await excuteQuery({
      query: "SELECT name FROM `litebans_history` WHERE uuid = ?",
      values: [data[i].uuid],
    });
    data[i].uuid = fetchUUID[0][0].name;
  }

  return {
    props: { data, pC, pT },
  }
}

export default function ListKicks({ data, pC, pT }) {
    return (
    <div>
      <Head>
        <title>Kicks | ThiccMC</title>
      </Head>
      <main>
        <Navbar></Navbar>
        <section style={{marginTop: '20px', marginRight: '10px', marginLeft: '10px', marginBottom: '20px'}}>
        <div className="card" style={{maxWidth: '800px', margin: '0 auto', borderWidth: '0px', borderRadius: '0px'}}>
          <div className="card-body">
            <h3 className="text-center card-title" style={{fontFamily: 'Segoe UI', marginBottom: '20px'}}>List for Kicks</h3>
            <SearchBar></SearchBar>
            <div className="text-center">
              <div className="table-responsive">
                <table className="table table-hover">
                  <thead style={{background: '#232323'}}>
                    <tr key="title">
                      <th style={{width: '150px'}}>Player</th>
                      <th style={{width: '150px'}}>Moderator</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                    {
                      data.map((a)=>{
                        var tA = `https://skin.qtpc.tech/resources/server/skinRender.php?vr=0&hr=0&headOnly=true&user=${a.uuid}`;
                        var eA = a.banned_by_uuid == "CONSOLE" || a.banned_by_uuid == "[CONSOLE]" ? "/console.png" : `https://skin.qtpc.tech/resources/server/skinRender.php?vr=0&hr=0&headOnly=true&user=${a.banned_by_name}`;
                        return (
                          <Link key={"id-" + a.id} href={`/info/kick-${a.id}`}>
                          <tr key={"id-" + a.id} style={{cursor: 'pointer'}}>
                            <td><img width={25} src={tA} />&nbsp;{a.uuid}</td>
                            <td><img width={25} src={eA} />&nbsp;{a.banned_by_name}</td>
                            <td>{a.reason}</td>
                          </tr>
                          </Link>
                        )
                      })
                    }
                  </tbody>
                </table>
              </div>
            </div>
            <div className="text-center" style={{marginTop: '10px', height: '38px'}}>
              <Link href={"/kicks/" + (pC - 1)}>
              <button className="btn btn-primary float-start" type="button" disabled={pC == 1 ? true : false}><i className="fas fa-chevron-left" /></button>
              </Link>
              <span>Page {pC}/{pT}</span>
              <Link href={"/kicks/" + (pC + 1)}>
              <button className="btn btn-primary float-end" type="button" disabled={pC == pT ? true : false}><i className="fas fa-chevron-right" /></button>
              </Link>
            </div>
          </div>
        </div>
      </section>
      </main>
    </div>
    )
}