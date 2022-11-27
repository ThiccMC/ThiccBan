import { DateTime } from "luxon";
import Error from "../_error";
import Head from "next/head";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";
import { InfoTable } from "src/components/Table";

export async function getServerSideProps(ctx: any) {
    let id = 0;
    if (ctx.params.id && /^[0-9]*$/.test(ctx.params.id)) id = ctx.params.id;
    return {
      props: { id },
    }
}

export default function BanInfo({ id }: { id: number }) {
    const router = useRouter()
    const type: any = null;
    const [data, setData] = useState(type);
    const [isLoading, setLoading] = useState(true);
    const [isError, setIsError] = useState(false);
    const [_nf, set_nf] = useState(false)

    useEffect(() => {
        if (id != 0) {
            const controller = new AbortController();
            const timeoutID = setTimeout(() => controller.abort(), 10000)

            fetch(`/api/bans?id=${id}`, { signal: controller.signal })
                .then((res) => res.json())
                .then((data) => {
                    setData(data)
                    setLoading(false)
                }).catch((e) => {
                    if (controller.signal.aborted && !data)  { 
                        setIsError(true)
                        setLoading(false)
                    }
                })
        } else set_nf(true)
    }, [])

    if (_nf) return <Error statusCode={404} />
    return (
        <>
        <Head>
            <title>{ (isLoading ? `Pending...` : isError ? "Error" : data.data != null ? `Ban #${id}` : "Not found") + ' | Punishments / ThiccMC'}</title>
        </Head>
        <div className="content">
            <div className="centered">
                <div className="card center" style={{maxWidth: '700px'}}>
                    <div className="card-body">
                    <div style={{marginBottom: '16px'}}>
                        <h3 style={{fontFamily: 'Minecraft', marginBottom: '0px'}}>Ban #{id}</h3>
                        <h6 className="text-muted mb-2" style={{marginTop: '0px'}}>{ isLoading ? `Pending...` : `Date: ${!isError && data.data != null ? DateTime.fromMillis(data.data.time).toFormat('MM/dd/yyyy hh:mm:ss') : "N/A"}`}</h6>
                    </div>
                    <div style={{marginBottom: '16px', overflow: isLoading ? 'none' : 'auto'}}>
                        { isLoading ? <span className="loader"></span> : isError ? <h6>An error occured while fetching data. Please try again.</h6> : data.data != null ? <InfoTable type="Ban" data={data.data} /> : <h5>Ban case <strong>#{id}</strong> does not exist in the database.</h5>}
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </>
    )
}
