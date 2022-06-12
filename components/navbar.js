import Head from "next/head";
import Link from 'next/link';

export default function Navbar({ children }) {
    return (
        <nav className="navbar navbar-dark navbar-expand-md py-3">
            <div className="container">
                <Link href="/">
                <a className="navbar-brand d-flex align-items-center">
                    <span><strong>ThiccMC</strong></span>
                </a>
                </Link>
                <button data-bs-toggle="collapse" className="navbar-toggler" data-bs-target="#navcol-5">
                    <span className="visually-hidden">Toggle navigation</span>
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navcol-5">
                    <ul className="navbar-nav ms-auto">
                        <li className="nav-item"><Link href="/bans"><a className="nav-link">Bans</a></Link></li>
                        <li className="nav-item"><Link href="/kicks"><a className="nav-link">Kicks</a></Link></li>
                        <li className="nav-item"><Link href="/mutes"><a className="nav-link">Mutes</a></Link></li>
                        <li className="nav-item"><Link href="/warns"><a className="nav-link">Warns</a></Link></li>
                        <li className="nav-item" style={{paddingTop: '5px',paddingLeft: '10px'}}>
                            <form action="/result" method="GET">
                            <input type="text" name="player" minLength="3" maxLength="16" id="p-search-inp" style={{ width: "150px", padding: '5px 4px 8px 12px', fontSize: '14px',borderTopLeftRadius: '4px',borderBottomLeftRadius: '4px',borderWidth: '0px'}} placeholder="Search player"/>
                            <button type="submit" className="btn btn-primary" role="button" id="p-search-sub" style={{padding: '0px',paddingBottom: '4px',width: '50px',paddingRight: '0px',paddingLeft: '0px',paddingTop: '4px',borderTopLeftRadius: '0px',borderBottomLeftTadius: '0px'}}>
                                <i className="fas fa-search"></i>
                            </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    );
}