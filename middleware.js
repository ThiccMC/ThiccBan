import { NextResponse, NextRequest } from 'next/server';
import Error from 'next/error';

export async function middleware(req, ev) {
    const { pathname } = req.nextUrl
    if (pathname == '/bans') {
        return NextResponse.redirect(new URL('/bans/1', req.url))
    }
    if (pathname == '/kicks') {
        return NextResponse.redirect(new URL('/kicks/1', req.url))
    }
    if (pathname == '/mutes') {
        return NextResponse.redirect(new URL('/mutes/1', req.url))
    }
    if (pathname == '/warns') {
        return NextResponse.redirect(new URL('/warns/1', req.url))
    }
    if (pathname == '/result') {
        if (req.nextUrl.searchParams.get('player')) {
            return NextResponse.redirect(new URL('/result/' + req.nextUrl.searchParams.get('player'), req.url))
        }
        return <Error statusCode={400} />;
    }
    return NextResponse.next()
}