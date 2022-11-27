import Error from "../_error";
import Head from "next/head";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";
import { ModeratorProfile } from "src/components/Table";

export async function getServerSideProps(ctx: any) {
    let user = ""; let page = 1;
    if (ctx.params.user) user = ctx.params.user;
    if (ctx.query.page && /^[0-9]*$/.test(ctx.query.page)) page = ctx.query.page;
    return {
      props: { user, page },
    }
}

export default function BanInfo({ user, page }: { user: string, page: number }) {
    const router = useRouter()
    const type: any = null;
    const [data, setData] = useState(type);
    const [query, setQuery] = useState(type);
    const [isError, setIsError] = useState(false);
    const [isLoading, setLoading] = useState(true);
    const [_nf, set_nf] = useState(false)

    useEffect(() => {
        if (user != "") {
            const controller = new AbortController();
            const timeoutID = setTimeout(() => controller.abort(), 10000)

            fetch(`/api/mods?user=${user}&page=${page}`, { signal: controller.signal })
                .then((res) => res.json())
                .then((data) => {
                    setData(data.query)
                    setLoading(false)
                }).catch((e) => {
                    if (controller.signal.aborted && !data)  { 
                        setIsError(true)
                        setLoading(false)
                    }
                })
        } else set_nf(true)
    }, [router.query.user, router.query.page])

    if (_nf) return <Error statusCode={404} />
    return (
        <>
        <Head>
            <title>{ (isLoading ? `Pending...` : isError ? `Error` : data == null ? "Not found" : `Moderator: ${data.user}`) + ' | Punishments / ThiccMC'}</title>
        </Head>
        <div className="content">
            <div className="centered">
                <div className="card center" style={{maxWidth: '700px'}}>
                <div className="card-body">
                    <div style={{marginBottom: '16px'}}>
                        <h3 style={{fontFamily: 'Minecraft', marginBottom: '0px'}}>{ isLoading ? 'Pending...' : isError ? 'Error occured' : data == null ? 'Player not found' : `${data.user}'s Profile`}</h3>
                        <h6 className="text-muted mb-2" style={{marginTop: '0px'}}>Punishment Execution History</h6>
                    </div>
                    <div style={{marginBottom: '16px', overflow: isLoading ? 'none' : 'auto'}}>
                        { isLoading ? <span className="loader" /> : isError ? <h6>Unable to fetch data.</h6> : data == null ? <h6>This player does not exist in the database.</h6> : <ModeratorProfile data={data} /> }
                    </div>
                </div>
                </div>
            </div>
        </div>
        </>
    )
}
