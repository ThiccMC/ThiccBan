import { useEffect, useState } from 'react';
import { useRouter } from 'next/router';
import { PunishTable } from 'src/components/Table';
import Head from 'next/head';

export async function getServerSideProps(ctx: any) {
    let page = 1;
    if (ctx.query.page && /^[0-9]*$/.test(ctx.query.page)) page = ctx.query.page;
    return {
      props: { page },
    }
}

export default function KickList({ page }: { page: number }) {
    const router = useRouter()
    const type: any = null;
    const [data, setData] = useState(type);
    const [isLoading, setLoading] = useState(true);
    const [isError, setIsError] = useState(false);

    useEffect(() => {
        const controller = new AbortController();
        const timeoutID = setTimeout(() => controller.abort(), 10000)

        fetch(`/api/kicks?page=${page}`, { signal: controller.signal })
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
    }, [router.query.page])

  return (
    <>
    <Head>
        <title>Kicks | Punishments / ThiccMC</title>
        <meta name="description" content="Kicks | Punishments / ThiccMC" />
    </Head>
    <div className="content">
        <div className="centered">
        <div className="card center" style={{maxWidth: '900px', marginTop: '20px'}}>
            <div className="card-body">
            <div style={{marginBottom: '16px'}}>
                <h3 style={{fontFamily: 'Minecraft', marginBottom: '0px'}}>List for Kicks</h3>
                <h5 className="text-muted mb-2" style={{marginTop: '0px'}}>Total: { isLoading ? "Pending..." : isError ? "N/A" : data.query.total}</h5>
            </div>
            <div style={{marginBottom: '16px', overflow: isLoading ? 'none' : 'auto'}}>
                { isLoading ? <span className="loader"></span> : isError ? <h6>An error occured while fetching data. Please try again.</h6> : <PunishTable type="kicks" data={data} />}
            </div>
            <div>
                {
                    (!isLoading && !isError) ? (
                    <ul className="list-inline" style={{marginBottom: '0px'}}>
                        <li className="list-inline-item">
                            <button className="btn btn-primary" onClick={() => { router.push(`?page=${data.query.pageCurrent - 1}`)}} type="button" disabled={ data.query.pageCurrent == 1 ? true : false }><i className="fas fa-chevron-left" /></button>
                        </li>
                        <li className="list-inline-item">Page { isLoading ? "?/?" : data.query.pageCurrent + "/" + data.query.pageTotal}</li>
                        <li className="list-inline-item">
                            <button className="btn btn-primary" onClick={() => { router.push(`?page=${data.query.pageCurrent + 1}`)}} type="button" disabled={ data.query.pageCurrent == data.query.pageTotal ? true : false }><i className="fas fa-chevron-right" /></button>
                        </li>
                    </ul>
                    ) : undefined
                }
                
            </div>
            </div>
        </div>
        </div>
    </div>
    </>
  )
}
