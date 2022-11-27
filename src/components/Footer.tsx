import Link from "next/link";

export default function Footer() {
    return (
        <div className="footer" style={{borderTopLeftRadius: '10px', borderTopRightRadius: '10px'}}>
            <div className="row" style={{marginLeft: '0px', marginRight: '0px'}}>
            <div className="col-md-5 col-l">
                <p style={{marginBottom: '0px'}}><span style={{color: 'rgb(173, 181, 189)'}}>© 2022 ThiccMC. All rights reserved!</span><br /></p>
            </div>
            <div className="col-md-7 col-r">
                <ul className="list-inline" style={{marginBottom: '0px'}}>
                <li className="list-inline-item"><Link className="link-light" href="/" key="f-home">Home</Link></li>
                <li className="list-inline-item"><a className="link-light" href="https://status.qtpc.tech" target="_blank" rel="noreferrer">Status</a></li>
                <li className="list-inline-item"><a className="link-light" href="/discord" target="_blank" rel="noreferrer">Discord</a></li>
                <li className="list-inline-item"><a className="link-light" href="/github" target="_blank" rel="noreferrer">GitHub</a></li>
                </ul>
            </div>
            </div>
        </div>
    )
}