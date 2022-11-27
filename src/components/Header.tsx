import Link from 'next/link'
import { useRouter } from 'next/router'
import Image from 'next/image'
import { FormEvent } from 'react'

export default function Header() {
  const router = useRouter()

  const searchPlayer = async (event: FormEvent) => {
    event.preventDefault()
    const query = event.target.search.value
    router.push(`/players/${query}`);
  }

  return (
      <div style={{background: 'rgb(28,27,33)', borderBottomRightRadius: '10px', borderBottomLeftRadius: '10px'}}>
        <nav className="navbar navbar-dark navbar-expand-md py-3 centered">
          <div className="container-fluid">
            <Link className="navbar-brand d-flex align-items-center" href="/" key="brand">
              <Image className="rounded-circle" src="/img/xd.png" alt="logo" width={35} height={35} /><span style={{fontFamily: 'Minecraft'}}>ThiccMC</span>
            </Link>
            <button data-bs-toggle="collapse" className="navbar-toggler" data-bs-target="#navcol" style={{borderWidth: '0px'}}>
              <span className="visually-hidden">Toggle navigation</span><span className="navbar-toggler-icon" />
            </button>
            <div className="collapse navbar-collapse" id="navcol">
              <ul className="navbar-nav ms-auto">
                <li className="nav-item">
                <Link className="nav-link" href="/bans" key="bans">
                  <span className="nav-icon">&nbsp; &nbsp;<i className="fas fa-caret-right" />&nbsp; &nbsp; &nbsp;&nbsp;</span>Bans
                </Link>
                </li>
                <li className="nav-item">
                <Link className="nav-link" href="/mutes" key="mutes">
                  <span className="nav-icon">&nbsp; &nbsp;<i className="fas fa-caret-right" />&nbsp; &nbsp; &nbsp;&nbsp;</span>Mutes
                </Link>
                </li>
                <li className="nav-item">
                <Link className="nav-link" href="/kicks" key="kicks">
                  <span className="nav-icon">&nbsp; &nbsp;<i className="fas fa-caret-right" />&nbsp; &nbsp; &nbsp;&nbsp;</span>Kicks
                </Link>
                </li>
                <li className="nav-item">
                <Link className="nav-link" href="/warns" key="warns">
                  <span className="nav-icon">&nbsp; &nbsp;<i className="fas fa-caret-right" />&nbsp; &nbsp; &nbsp;&nbsp;</span>Warns
                </Link>
                </li>
                {/* <li className="nav-item language">
                  <div className="nav-item dropdown">
                    <a className="link-light" style={{ textDecoration: 'none' }} aria-expanded="false" data-bs-toggle="dropdown" href="#">
                      <span className="nav-icon">&nbsp; &nbsp;<i className="fas fa-caret-right" />&nbsp; &nbsp; &nbsp;&nbsp;</span>
                      <img src="https://www.worldometers.info/img/flags/vm-flag.gif" width={25} style={{borderRadius: '4px'}} />
                    </a>
                    <div className="dropdown-menu dropdown-menu-end"><a className="dropdown-item" href="#"><img src="https://www.worldometers.info/img/flags/vm-flag.gif" width={25} style={{borderRadius: '4px'}} height={17} />&nbsp;Tiếng Việt</a><a className="dropdown-item" href="#"><img src="https://www.worldometers.info/img/flags/uk-flag.gif" width={25} style={{borderRadius: '4px'}} height={17} />&nbsp;English</a></div>
                  </div>
                </li> */}
                <li className="nav-item search">
                  <form onSubmit={searchPlayer}>
                  <div className="input-group search">
                    <input className="form-control" type="text" name="search" placeholder="Search a player..." style={{fontSize: '14px', borderWidth: '0px'}} autoComplete="off" inputMode="text" />
                    <button className="btn btn-primary" type="submit"><i className="fas fa-search" /></button>
                  </div>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
  )
}
