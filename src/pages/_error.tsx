import { NextPageContext } from 'next'
import Head from 'next/head'
import Link from 'next/link'
import { useRouter } from 'next/router'
import { errors } from '../lib/constants'

export default function Error({ statusCode }: { statusCode: number }) {
    const router = useRouter()
    return (
        <>
            <Head>
                <title>Home | Punishments / ThiccMC</title>
                <meta name="description" content="Something went wrong!" />
            </Head>
            <div className="content">
                <div className="centered">
                <div className="card center" style={{maxWidth: '500px', marginTop: '100px'}}>
                    <div className="card-body">
                    <div style={{marginBottom: '16px'}}>
                        <h4 style={{fontFamily: 'Minecraft', marginBottom: '0px'}}>Something went wrong!</h4>
                    </div>
                    <div style={{marginBottom: '16px'}}>
                        <h5 className="text-light">Error: {statusCode + " - " + errors[statusCode]}</h5>
                    </div>
                    <div style={{marginBottom: '0px'}}>
                        <ul className="list-inline">
                            <li className="list-inline-item"><a href="#" className="link-light" onClick={() => router.back()}><i className="fas fa-arrow-left" /> Go Back</a></li>
                            <li className="list-inline-item"><Link href="/" className="link-light"><i className="fas fa-home" /> Home</Link></li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </>
    )
}

Error.getInitialProps = ({ res, err }: NextPageContext) => {
    const statusCode = res ? res.statusCode : err ? err.statusCode : 404
    return { statusCode }
}
