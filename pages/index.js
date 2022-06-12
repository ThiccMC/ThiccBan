import axios from 'axios';
import Head from 'next/head'
import Image from 'next/image'
import Navbar from '../components/navbar';
import excuteQuery from "../lib/sql";

export async function getServerSideProps(context) {
  const result = await excuteQuery({
    query: 'SELECT (SELECT COUNT(*) FROM `litebans_bans`) AS bans, (SELECT COUNT(*) FROM `litebans_kicks`) AS kicks, (SELECT COUNT(*) FROM `litebans_mutes`) AS mutes, (SELECT COUNT(*) FROM `litebans_warnings`) AS warns;',
    values: null,
  });
  var data = result[0][0];
  return {
    props: { data },
  }
}

export default function Home({ data }) {
  return (
    <div>
      <Head>
        <title>Punishments | ThiccMC</title>
        <meta name="description" content="ThiccMC Punishments List" />
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <main>
        <Navbar></Navbar>
        <section style={{marginTop: '100px',marginRight: '10px',marginLeft: '10px'}}>
          <div className="card" style={{maxWidth: "520px", margin: "0 auto", borderWidth: "0px", borderRadius: "0px"}}>
              <div className="card-body">
                  <h2 className="text-center card-title" style={{fontFamily: "Segoe UI", marginBottom: "0px"}}>ThiccMC</h2>
                  <h5 className="text-center text-muted card-subtitle" style={{marginBottom: "20px", marginTop: "0px"}}>Punishments list</h5>
                  <div style={{marginBottom: "20px"}}>
                    <form action="/result" method="GET">
                    <input className="d-inline-block" type="text" name="player" minLength="3" maxLength="16" id="p-search-inp-indx" style={{paddingTop: "5px", paddingBottom: "8px", paddingRight: "4px", paddingLeft: "12px", fontSize: "14px", borderWidth: "0px"}} placeholder="Search player" required/>
                    <button type="submit" className="btn btn-primary" role="button" id="p-search-sub-indx" style={{padding: "0px", paddingBottom: "4px", paddingRight: "0px", paddingLeft: "0px", paddingTop: "4px", marginTop: "0px"}}><i className="fas fa-search"></i></button>
                    </form>
                  </div>
                  <div>
                      <h5 className="text-center text-muted">Punishment statistics:</h5>
                      <p className="text-center" style={{marginBottom: '0px'}}><i className="fas fa-hammer"></i>&nbsp;<span className="punish-stats-text">Bans</span>&nbsp;<span className="punish-stats-count" style={{background: 'var(--bs-red)'}}>{data.bans}</span>&nbsp; &nbsp; &nbsp; &nbsp;<i className="fas fa-sign-out-alt"></i>&nbsp;<span className="punish-stats-text">Kicks</span>&nbsp;<span className="punish-stats-count" style={{background: "var(--bs-success)"}}>{data.kicks}</span> &nbsp; &nbsp; &nbsp;&nbsp;<i className="fas fa-ban"></i>&nbsp;<span className="punish-stats-text">Mutes</span>&nbsp;<span className="punish-stats-count" style={{background: "var(--bs-blue)"}}>{data.mutes}</span> &nbsp; &nbsp; &nbsp;&nbsp;<i className="fas fa-exclamation-triangle"></i>&nbsp;<span className="punish-stats-text">Warns</span>&nbsp;<span className="punish-stats-count" style={{background: "var(--bs-warning)"}}>{data.warns}</span></p>
                  </div>
              </div>
          </div>
        </section>
      </main>
    </div>
  )
}
